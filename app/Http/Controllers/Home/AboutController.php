<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usersinfo;
use App\Models\Users;
use App\Models\Home_Users;
use DB;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates_data = Controller::cates_data();
        $about_data = Usersinfo::where('id',7)->get();
        $data1 = DB::table('home_users as u')
        ->join('users_info as i','u.id','=','i.uid')
        ->select('i.id as i_id','u.id as u_id')
        ->get();
        foreach ($about_data as $k => $v) {
            $value = $v;
        }
        return view('home.about.about',['cates_data'=>$cates_data,'value'=>$value]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates_data = Controller::cates_data();
        $about_data = Usersinfo::where('id',5)->get();
        foreach ($about_data as $k => $v) {
            $value = $v;
        }
        return view('home.about.create',['cates_data'=>$cates_data,'value'=>$value]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();
        
        $data = $request->except(['_token']);
        $userinfo = new Usersinfo;
        $users = new Home_Users;
        //接收返回的id
        $id = $users->id;
        $userinfo->uid = $id;
        $userinfo->nick_name = $data['nick_name'];
        $userinfo->real_name = $data['real_name'];
        $userinfo->sex = $data['sex'];
        $userinfo->uname_img = $data['uname_img'];
        $userinfo->work = $data['work'];
        $userinfo->personal_label = $data['personal_label'];
        $userinfo->location = $data['location'];
        $userinfo->email = $data['email'];
        $userinfo->QQ = $data['QQ'];
        $userinfo->chat = $data['chat'];
        $userinfo->description = $data['description'];
        $res = $userinfo->save();
        
        if($res){
            return redirect('home/about');
        }else{
            return back();
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
        //
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
        
    }

    /**
     * @param  头像上传
     * @return [type]
     */
    public function upload(Request $request)
    {  
        //接收数据
        $file = $request->file('img_thumb');
        
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
}
