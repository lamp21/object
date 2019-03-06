<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Users;
use Hash;
use App\Models\Usersinfo;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $data = Users::where('uname','like','%'.$search.'%')->paginate($count);
        // dump($data);

        //加载视图
        return view('admin.users.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {

        /**
        *开启事务
        */
        DB::beginTransaction();
        //接收数据
        $data = $request->except(['_token','repassword']);
        $users = new Users;
        $users->uname = $data['uname'];
        $users->upass = Hash::make($data['upass']);
        $users->phone = $data['phone'];
        $res1 = $users->save();
        //接收返回的id
        $id = $users->id;


        $userinfo = new Usersinfo;
        $userinfo->uid = $id;
        $userinfo->description = $data['description'];
        $res2 = $userinfo->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
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
        $users = Users::find($id);
        // dump($users);
        

        //加载视图
        return view('admin.users.edit',['users'=>$users]);
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
         /**
        *开启事务
        */
        DB::beginTransaction();

        //修改主表
        $user = Users::find($id);
        $user->email = $request->input('email','');
        $user->phone = $request->input('phone','');
        $res1 = $user->save();
        $description = $request->input('description','');

        //修改附表
        $res2 = Usersinfo::where('uid',$id)->update(['description'=>$description]);

        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','修改成功');
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
        /**
        *开启事务
        */
        // dump($_SERVER);exit;
        DB::beginTransaction();

        $res1 = Users::destroy($id);
        $res2 = Usersinfo::where('uid',$id)->delete();
        if($res1 && $res2){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }

    //批量添加数据(测试)
    public function setdata(){
        for ($i=0; $i < 30; $i++) { 
        $users = new Users;
        $users->uname = 'test'.rand(1000,9999);
        $users->upass = Hash::make('123');
        $users->email = 'test'.rand(1000,9999).'@qq.com';
        $users->phone = '1'.rand(3,9).rand(12345,98765).rand(1234,5678);
        $res1 = $users->save();
        //接收返回的id
        $id = $users->id;


        $userinfo = new Usersinfo;
        $userinfo->uid = $id;
        $userinfo->description = 'test'.rand(123456,987654);
        $res2 = $userinfo->save();
        }
    }
}
