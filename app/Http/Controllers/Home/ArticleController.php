<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Usersinfo;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCates(){
       $cate_uid = DB::table('cates')->select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        foreach($cate_uid as $key => $value){
            // 统计 path 中的,符号 出现的次数
            $n = substr_count($value->path,',');
            // echo $n;
            // 重复 使用一个字符串
            $cate_uid[$key]->cname = str_repeat('|----',$n).$value->cname;
            }
            return $cate_uid;
    }

    public function index()
    {
        $a = Controller::cates_data();
        $uid = session('userinfo')->id;
        $userinfo = DB::table('users_info')->where('uid',$uid)->get();
        $word_res = DB::table('article')->where('users_uid',$uid)->get();
        return view('home.article.own_list',['cates_data'=>$a,'userinfo'=>$userinfo,'word_res'=>$word_res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=0)
    {
        //加载视图
        $a = Controller::cates_data();
        $user_id = session('userinfo')->id;
        $user = DB::table('users_info')->where('uid',$user_id)->get();
        // dd($user);
        return view('home.article.sendtext',['cates_data'=>$a,'id'=>$id,'cate_uid'=>self::getCates(),'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //补充字段数据
        $users = session('userinfo')->id;
        $users_id = DB::table('users_info')->where('uid',$users)->value('id');
        $time = date('Y-m-d');
        //dump($request->all());
        //分类id
        //dd($request->input('cate_uid'));
        //$cate_res= $request->input('cate_uid');
        // dd($cate_res);
        //$cate_result = DB::table('cates')->where('id',$cate_res)->value('cname');
        $res = DB::table('article')->insert([
                'art_title'=>$request->input('art_title'),
                'users_uid'=>$users,
                'art_time'=>$time,
                'cate_uid'=>$request->input('cate_uid'),
                'art_content'=>$request->input('art_content'),
             ]);
        if ($res) {
             // 执行 添加 
            DB::commit();
            return redirect('/home/article')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dump($id);
        $a = Controller::cates_data();
        $wordres = DB::table('article')->where('id',$id)->get();
        //读取session中的id
        $id = session('userinfo')->id;
        $userinfo = new Usersinfo;
        $cates_data = Controller::cates_data();
        $about_data = Usersinfo::where('uid',$id)->get();
        foreach ($about_data as $k => $v) {
            $value = $v;
        }

        //获取遍历评论的数据
        $message = DB::table('user_message as uu')
            ->join('article as ww','uu.message_uid','=','ww.id')
            ->join('users_info as dd','uu.user_mid','=','dd.id')
            ->join('home_users as ff','ff.id','=','dd.uid')
            ->select('uu.message','dd.uname_img','ff.uname','uu.time_res','uu.id')
            ->get();
            //dd($message);
        return view('home.article.wordinfo',['cates_data'=>$a,'wordres'=>$wordres,'value'=>$value,'message'=>$message]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dump($id);
        $a = Controller::cates_data();
        $users_uid = session('userinfo')->id;
        $users_res = DB::table('users_info')->where('uid',$users_uid)->get();
        $default = DB::table('article')->where('id',$id)->get();
        $update_id = DB::table('article')->find($id);
        return view('home.article.text_edit',['cates_data'=>$a,'id'=>$id,'cate_uid'=>self::getCates(),'users_res'=>$users_res,'default'=>$default,'update_id'=>$update_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dump($id);
        //补充字段数据
        $data = session('userinfo')->id;
        $data_id = DB::table('users_info')->where('uid',$data)->value('id');
        $times = date('Y-m-d');
        $res_data= $request->input('cate_uid');
        $result_data = DB::table('cates')->where('id',$res_data)->value('cname');
        $result = DB::table('article')->where('id',$id)->update([
                'art_title'=>$request->input('art_title'),
                'users_uid'=>$data_id,
                'art_time'=>$times,
                'cate_uid'=>$result_data,
                'art_content'=>$request->input('art_content'),
             ]);
        if ($result) {
             // 执行 添加 
            DB::commit();
            return redirect('/home/article')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dump($id);
        /**
        *开启事务
        */
        DB::beginTransaction(); 
        $delete = DB::table('article')->where('id',$id)->delete();
        if($delete){
                DB::commit();
                return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
            }else{
                DB::rollBack();
                return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
            }
    }
}
