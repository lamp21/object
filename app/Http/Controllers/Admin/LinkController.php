<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	//dump($request->all());
    	$count = $request->input('count',5);
    	$search = $request->input('search','');
    	$link_data = DB::table('link')->where('link_name','like','%'.$search.'%')->paginate($count);
        //加载视图
        return view('admin.link.index',['data'=>$link_data,'request'=>$request->all()]);
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
        //审核通过
        //echo $id;
        $change = DB::table('link')->find($id);
        //dump($change); 
        $change_link['link_agree'] = $change->link_agree;
        //dd($change_link);
        	
        DB::table('link')->where('id',$id)->update(['link_agree' => 1]);
        return redirect($_SERVER['HTTP_REFERER'])->with('SUCCESS','通过审核');	
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
     //dd($id);
     /**
        *开启事务
        */
        DB::beginTransaction();
     //echo $id;
     $change = DB::table('link')->find($id);
     //dump($change); 
     $del = DB::table('link')->where('id',$id)->delete();
     if($del){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
