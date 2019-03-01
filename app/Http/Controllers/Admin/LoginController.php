<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;

use App\Models\Users;
use App\Models\admin_user;
use Hash;
use DB;

use Auth;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //echo "aaaa";
        
        return view('admin.login.login');
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
        // $data = $request->all();
        

        // $username = $data['uname'];
        // $password = md5($data['upass']);

        // //判断长度是否一致,正则
        
        // //判断数据库是否有该用户
        // $map['uname'] = $username;
        // $map['password'] = $password;

        // //判断是否禁用
        // /*$map['status'] = 0;

        // //判断是不是管理员
        // $map['level'] = array('gt',1);*/

        // $user = new Admin_User;
        // $userinfo = $user->where($map)->select();
        // //var_dump($userinfo);
        // if($userinfo){
        //     unset($userinfo[0]['password']);
        //     $_SESSION['admin'] = $userinfo[0];
        //     //var_dump($_SESSION);
            
          
        //     return redirect('/admin/')->with('success','登录成功');
        // }else{
           
        //      return back()->with('error','登录失败');
        // }
    


        // dump($request->all());
        // $users = new admin_user;
        DB::beginTransaction();
        //
        $data = $request->except(['_token']);
                //dd($data['uname']);
        $users = new admin_user;
        $users->uname = $data['uname'];
        $users->password = Hash::make($data['password']);
        //dd($users->uname);
        $data_info = DB::table('admin_user')->first();
        //dd($data_info);
        // $data_info['uname'] =  $users->uname;
        // $data_info['password'] =  $users->password;
        // if (Auth::attempt(['uname' => $users->uname, 'password' =>$users->password]) == $data_info) {
        //     // 认证通过...
        //     return redirect('/admin/index/')->intended('dashboard','登录成功');
        // }
        // dd($userinfo);
        
        if($data_info){
            //DB::commit();
            return redirect('/admin/users/')->with('success','登录成功');
        }else{
            //DB::rollBack();
            return back()->with('error','登录失败');
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
        //
    }
}