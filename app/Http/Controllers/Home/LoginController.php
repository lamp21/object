<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home_Users;
use DB;
use Hash;
class LoginController extends Controller
{
	/**
	 * [login description]加载登录页面
	 * @return [type] [description]
	 */
    public function login(){
    	return view('home.login.login');
    }

    /**
     * [dologin description]处理登录
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function dologin(Request $request){
    	// 接收 数据
        $data = $request->except(['_token']);
        // 通过用户获取密码
        $userinfo = DB::table('home_users')->where('phone',$data['phone'])->first();
        if(!$userinfo){
            echo "<script>alert('用户不存在');location='/home/login';</script>";
        }

        if(!Hash::check($data['upass'],$userinfo->upass)){
            echo "<script>alert('密码错误');location='/home/login';</script>";
        }

        session(['home_login'=>true]);
        session(['userinfo'=>$userinfo]);

        // 登录成功
        echo "<script>alert('登录成功');location='/home/index';</script>";
    }

    /**
     * 注销
     */
    public function logout(Request $request)
    {
        session()->forget('userinfo');
        return redirect('/home/index');
    }
}
