<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NodesStoreRequest;
use App\Models\Roles;
use App\Models\Nodes;
use DB;
class NodesController extends Controller
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
        $data = Roles::where('rname','like','%'.$search.'%')->paginate($count);

        $count = $request->input('count',8);
        $search = $request->input('search','');
        $res = Nodes::where('ndesc','like','%'.$search.'%')->paginate($count);

        $roles_data = DB::table('roles')->get();  // 角色
        $nodes_data = DB::table('nodes')->get();  // 节点
        return view('admin.nodes.index',['roles_data'=>$roles_data,'nodes_data'=>$nodes_data,'data'=>$data,'res'=>$res,'request'=>$request->all()]);
    }

    public function nodeadd(){

        return view('admin.nodes.nodeadd');
    }

    public function insert(Request $request){

        $data = $request->except(['_token']);
        // 权限处理
        if($data['cname'] != $data['cname'].'controller') {
            $data['cname'] = $data['cname'].'controller';
        }
        $res = DB::table('nodes')->insert($data);
        if($res){
           return redirect('admin/nodes')->with('success','添加成功');
       }else{
           return back()->with('success','添加失败');
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NodesStoreRequest $request)
    {
       $data = $request->except(['_token']);
       $res = DB::table('roles')->insert($data);
       if($res){
           return redirect('admin/nodes')->with('success','添加成功');
       }else{
           return back()->with('success','添加失败');
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
        // 获取 当前的 角色
        $role = DB::table('roles')->where('id',$id)->first();

        // 获取 当前角色的 权限节点的ID
        $role_nodes_data = DB::table('roles_nodes')->where('rid',$id)->select('nid')->get();
        $role_nodes_data_nid = [];
        foreach ($role_nodes_data as $key => $value){
            $role_nodes_data_nid[] = $value->nid;
           
        }
        // 获取权限所有的节点
        $nodes_data = DB::table('nodes')->get();
        return view('admin.nodes.edit',['role'=>$role,'nodes_data'=>$nodes_data,'role_nodes_data_nid'=>$role_nodes_data_nid]);
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
        // 接收 数据
        $nids = $request->input('nids');

        // 删除 旧数据
        DB::table('roles_nodes')->where('rid',$id)->delete();
        foreach ($nids as $key => $nid) {
            $temp = [
                'rid'=>$id,
                'nid'=>$nid,
            ];
            DB::table('roles_nodes')->insert($temp);
        }
        return back()->with('success','添加成功');
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
