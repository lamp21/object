<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WonderfulStoreRequest;
use App\Http\Requests\WonderfulUpdateRequest;
use DB;
class WonderfulController extends Controller
{
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wonderinfo = DB::table('wonderful')->get();
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $wonderful_info = DB::table('wonderful')->where('title','like','%'.$search.'%')->paginate($count);
        //加载视图
        return view('admin.wonderful.index',['wonderful_info'=>$wonderful_info,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        //加载视图
        return view('admin.wonderful.create',['id'=>$id,'cate_uid'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WonderfulStoreRequest $request)
    {
        //开启事务
        DB::beginTransaction();
        //dump($request->input('wd_img'));
        $wd_img = $this->upload($request);
        //修改分类uid为分类名
        $cate_info = $request->input('cate_uid');
        $cate_uid = DB::table('cates')->where('id',$cate_info)->value('cname');

        //添加数据到数据库
        $wonderfuladd = DB::table('wonderful')->insert([
            'wd_img' =>$wd_img ,
            'title' => $request->input('title'),
            'wd_form' => $request->input('wd_form'),
            'wd_time' => $request->input('wd_time'),
            'cate_uid' => $cate_uid,
            'status' => $request->input('status'),
            'content' => $request->input('content'),
            ]);
        if ($wonderfuladd) {
           // 执行 添加 
            DB::commit();
            return redirect('/admin/wonderful')->with('success','添加成功');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=0)
    {
        //修改内容
        //dump($id);
        $update_id = DB::table('wonderful')->find($id);
        return view('admin.wonderful.edit',['id'=>$id,'cate_uid'=>self::getCates(),'update_id'=>$update_id]);
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WonderfulUpdateRequest $request, $id)
    {
        //开启事务
        DB::beginTransaction();
        $cate_data = $request->input('cate_uid');
        $cate_uid = DB::table('cates')->where('id',$cate_data)->value('cname');
        $upload_file = $this->upload($request);
        //dump($upload_file);
        $res = DB::table('wonderful')->where('id',$id)->update([
        'wd_img' =>$upload_file,
        'title' => $request->input('title'),
        'wd_form' => $request->input('wd_form'),
        'wd_time' => $request->input('wd_time'),
        'cate_uid' => $cate_uid,
        'status'=>$request->input('status'),
        'content' => $request->input('content'),
        ]);
        if ($res) {
           // 执行 添加 
            DB::commit();
            return redirect('/admin/wonderful')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
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
        //dd($id);
         /**
        *开启事务
        */
        DB::beginTransaction(); 
        $delete = DB::table('wonderful')->where('id',$id)->delete();
        if($delete){
                DB::commit();
                return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
            }else{
                DB::rollBack();
                return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
            }
        
    }

    public function upload(Request $request)
    {  
        //开启事务
        DB::beginTransaction();
        //接收数据
        $file = $request->file('wd_img');
        if($file->isValid()){
            //获取图片的后缀名
            $extension = $file->extension();

            //存储名称
            $newfile = md5(date('YmdHis').rand(1000,9999)).'.'.$extension;

            // 将文件上传到本地服务器
            //将文件从临时目录移动到制定目录
            $path = $file->move(public_path().'/upload',$newfile);
            //将上传文件的路径返回给客户端
            return '/upload/'.$newfile; 
        }
    }
    public function change($id)
    {
         /**
        *开启事务
        */
        DB::beginTransaction(); 
        //dump($id);
        $change = DB::table('wonderful')->where('id',$id)->value('status');
        if ($change = 1) {
            DB::table('wonderful')->where('id',$id)->update(['status'=>2]);
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功'); 
        }

    }
    public function dochange($id)
    {
         /**
        *开启事务
        */
        DB::beginTransaction(); 
        //dump($id);
        $change = DB::table('wonderful')->where('id',$id)->value('status');
        if ($change = 2) {
            DB::table('wonderful')->where('id',$id)->update(['status'=>1]);
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功'); 
        }
    }
}
