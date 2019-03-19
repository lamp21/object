<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Hash;

class LoginController extends Controller
{   
    // 进展 登录 页面
    public function login(){

        return view('admin.login.index');
    }

    // 处理 登录
    public function dologin(Request $request){
        // 接收 数据
        $data = $request->except(['_token']);

        // 通过用户获取密码
        $usersinfo = DB::table('users')->where('uname',$data['uname'])->first();
        if(!$usersinfo){
            echo "<script>alert('用户不存在');location='/login';</script>";
        }
        if(!Hash::check($data['upass'],$usersinfo->upass)){
            echo "<script>alert('密码错误');location='/login';</script>";
        }

        // 获取用户当前的权限
        $admin_nodes = DB::select('select n.cname,n.aname from nodes as n,users_roles as ur,roles_nodes as rn where ur.uid = '.$usersinfo->id.' and ur.rid = rn.rid and rn.nid = n.id');
        $arr = [];
        foreach($admin_nodes as $key => $value){
            $arr[$value->cname][] = $value->aname;
            if($value->aname == 'create'){
                $arr[$value->cname][] = 'store';
            }
            if($value->aname == 'nodeadd'){
                $arr[$value->cname][] = 'store';
            }
            if($value->aname == 'edit'){
                $arr[$value->cname][] = 'update';
            }
            if($value->aname == 'role'){
                $arr[$value->cname][] = 'update';
            }
        }
        // 赋值 后天 首页操作
        $arr['indexcontroller'][] = 'index';
        // 将获取到的权限 放入到session
        session(['admin_node_type'=>$arr]);

        session(['admin_login'=>true]);

        session(['usersinfo'=>$usersinfo]);

        // 登录成功
        echo "<script>alert('登录成功');location='/admin';</script>";
    }
    
    public function logout(Request $request)
    {
        session(['users'=>null]);
        return redirect('/login');
    }
}