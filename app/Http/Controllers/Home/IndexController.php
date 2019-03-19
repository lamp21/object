<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Advert;
use App\Models\Announcement;
use DB;
class IndexController extends Controller
{   

    public static function getPidCates($pid = 0){
        //echo "aaa";
        $cates_data = Cates::where('pid',$pid)->get();//一级分类
        $array = [];
        foreach($cates_data as $key => $value){
            $value['sub'] = self::getPidCates($value->id);
            $array[] = $value;
        }
        return $array;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $data_advert = Advert::limit(6)->get();
        $data_announcement = Announcement::limit(5)->get();
        // dd($data_announcement);
        $data = Controller::cates_data();
        $show = DB::table('wonderful')->limit(6)->get();
        $default = DB::table('wordphoto')->limit(5)->get();
        $article_res = DB::table('article')->where('display',1)->get();
        $data_res = DB::table('article as a')
        ->join('users_info as u','a.users_uid','=','u.uid' )
        ->join('home_users as h','h.id','=','u.uid')
        ->select('a.display','a.users_uid','u.nick_name','u.uname_img','h.uname','a.id')
        ->where('display',1)
        ->orWhere('a.id')
        ->get();
        // dd($data_res);
        if($data_res->first() != null){
            foreach ($data_res as $key => $val) {
            $value = $val;
            }
        }else{
            $value = '暂无数据';
        }

       /* //首页中间栏的分类
        DB::table('cates')->get();*/
        return view('home.index.index',['cates_data'=>$data,'data_advert'=>$data_advert,'data_announcement'=>$data_announcement,'show'=>$show,'default'=>$default,'article_res'=>$article_res,'value'=>$value]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * //网站公告详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $data_announcement = Announcement::find($id);
        $data_announcement = DB::table('announcement')->where('id',$id)->get();
        // dd($data_announcement);
        $cates_data = Controller::cates_data();
        return view('home.detail.detail',['cates_data'=>$cates_data,'data_announcement'=>$data_announcement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 
    //登录
    public function login(){
        return view('home.login.login');
    }
    public function wonderful($id)
    {
        
    }
}







