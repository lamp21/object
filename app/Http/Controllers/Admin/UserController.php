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
    
    public function role($id){
        // 获取 所有 的 用户
        $user = Users::find($id);

        // 获取 所有 的 用户 角色的ID
        $user_role_data = DB::table('users_roles')->select('rid')->where('uid',$id)->get();
        $user_role_data_rids = [];
        foreach ($user_role_data as $value) {
            $rid = $value->rid;
            $user_role_data_rids[] = $rid;
        }
        // 获取 所有 的 角色
        $roles_data = DB::table('roles')->get();
        return view('admin.users.role',['user'=>$user,'roles_data'=>$roles_data,'user_role_data_rids'=>$user_role_data_rids]);
    }

    public function updaterole(Request $request,$uid){

        // 获取 角色ID
        $rids = $request->input('rids');
        
        // 删除 角色ID
        DB::table('users_roles')->where('uid',$uid)->delete();

        foreach ($rids as $rid) {
            $temp = [
                'uid'=>$uid,
                'rid'=>$rid,
            ];
            DB::table('users_roles')->insert($temp);
        }
        return back()->with('success','修改成功');
    }

    public function editnodes(){
        
    }

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
        // $id = $users->id;


        // $userinfo = new Usersinfo;
        // $userinfo->uid = $id;
        // $userinfo->description = $data['description'];
        // $res2 = $userinfo->save();

        if($res1){
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
        $old_upass = $request->input('upass');
        $new_upass = $request->input('u_upass');
        // 通过用户获取密码
        $userinfo = DB::table('users')->where('id',$id)->select('upass')->first();
        // dump($userinfo);

        if(!Hash::check($old_upass,$userinfo->upass)){
            echo "<script>alert('原密码错误');location='{$id}/edit';</script>";
        }
        //判断两次密码是否一样
        if($old_upass == $new_upass){
            echo "<script>alert('原密码不能和新密码相同！');location='{$id}/edit';</script>";
        }


        //赋值
        $update = array(
            'upass'=>Hash::make($new_upass)
        );
        // dump($update);


        //修改
        $result = DB::table('users')->where('id',$id)->update($update);
        // dump($result);
        // dump($new_upass);exit;

        if($result){
            return redirect('admin/users')->with('success','修改成功');
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
        // $res2 = Usersinfo::where('uid',$id)->delete();
        if($res1){
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
