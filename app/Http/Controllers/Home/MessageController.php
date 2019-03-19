<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
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
    public function show(Request $request,$id)
    {
        //开启事务
        DB::beginTransaction();
        //添加评论
        $timing_res = date('Y-m-d');
        $userid_res = DB::table('article')->where('id',$id)->value('users_uid');
        $res = DB::table('user_message')->insert([
            'user_mid'=>$userid_res,
            'message_uid'=>$id,
            'message'=>$request->input('message'),
            'time_res'=>$timing_res
        ]);
        //dd($res);
        if($res){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','评论成功');
        }else{
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','评论失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        //dump($id);
         /**
        *开启事务
        */
        DB::beginTransaction(); 
        $mess_res = DB::table('user_message')->where('id',$id)->delete();
        if($mess_res){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }

}
