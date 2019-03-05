<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Users;
use Hash;
use DB;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.register.register');
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
     * 注册
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'uname' => 'required',
            'upass' => 'required',
            'repassword' => 'required',
            'phone' => 'required',
        ],[
            'uname.require'=>'用户名必填',
            'upass.require'=>'密码必填',
            'repassword.require'=>'密码必填',
            'phone.require'=>'手机号必填',
        ]);
        /**
        *开启事务
        */
        DB::beginTransaction();
        //接收数据
        $data = $request->except(['_token','code','repassword']);
        $users = new Users;
        $users->uname = $data['uname'];
        $users->upass = Hash::make($data['upass']);
        $users->phone = $data['phone'];
        $res = $users->save();
        
        if($res){
            DB::commit();
            return redirect('home/index');
        }else{
            DB::rollBack();
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
        //
    }
}
