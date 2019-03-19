<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usersinfo;
use App\Models\Home_Users;
use DB;
use Hash;
class RepasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_users = new Home_Users;
        //读取session中的id
        $id = session('userinfo')->id;
        $userinfo = new Usersinfo;
        $cates_data = Controller::cates_data();
        $about_data = Usersinfo::where('uid',$id)->get();
        foreach ($about_data as $k => $v) {
            $value = $v;
        }
        return view('home.repassword.index',['cates_data'=>$cates_data,'value'=>$value]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     *修改密码
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // 接收 数据
        $old_upass = $request->input('upass');
        $new_upass = $request->input('new_upass');
        // 通过用户获取密码
        $userinfo = DB::table('home_users')->where('id',$id)->select('upass')->first();
        if(!Hash::check($old_upass,$userinfo->upass)){
            echo "<script>alert('密码错误');location='/home/repassword';</script>";
        }
        //判断两次密码是否一样
        if($old_upass == $new_upass){
            echo "<script>alert('原密码不能和新密码相同！');location='/home/repassword';</script>";
        }

        //赋值
        $update = array(
            'upass'=>Hash::make($new_upass)
        );

        //修改
        $result = DB::table('home_users')->where('id',$id)->update($update);
        if($result){
            echo "<script>alert('修改成功');location='/home/about';</script>";
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
        //
    }
}
