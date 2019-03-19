<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid_res = DB::table('article as aa')
            ->join('home_users as hh','aa.users_uid','=','hh.id')
            ->join('cates as cc','aa.cate_uid','=','cc.id')
            ->select('hh.uname','cc.cname','aa.art_title','aa.art_time','aa.art_content','aa.art_status','aa.display','aa.id')
            ->get();
            // dd($uid_res);
            return view('admin.article.index',['uid_res'=>$uid_res]);
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
        //dump($id);
        $list_res = DB::table('article')->where('id',$id)->get();
        return view('admin.article.list',['list_res'=>$list_res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dump($id);
        /**
        *开启事务
        */
        DB::beginTransaction(); 
        //dump($id);
        $edit_res = DB::table('article')->where('id',$id)->value('art_status');
        if ($edit_res = 1) {
            DB::table('article')->where('id',$id)->update(['art_status'=>2]);
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功'); 
        }
    }
    public function doedit($id)
    {
        //dump($id);
        /**
        *开启事务
        */
        DB::beginTransaction(); 
        //dump($id);
        $edit_result = DB::table('article')->where('id',$id)->value('art_status');
        if ($edit_result = 2) {
            DB::table('article')->where('id',$id)->update(['art_status'=>1]);
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功'); 
        }
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
         /**
        *开启事务
        */
        DB::beginTransaction(); 
        $del_res = DB::table('article')->where('id',$id)->delete();
        if($del_res){
                DB::commit();
                return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
            }else{
                DB::rollBack();
                return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
            }
    }
    public function display($id)
    {
        //dd($id);
        /**
        *开启事务
        */
        DB::beginTransaction(); 
        //dump($id);
        $dislay_result = DB::table('article')->where('id',$id)->value('display');
        //dd($dislay_result);
        if ($dislay_result == 0) {
            DB::table('article')->where('id',$id)->update(['display'=>1]);
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功'); 
        }
    }
   public function dodisplay($id)
    {
        //dump($id);
        /**
        *开启事务
        */
        DB::beginTransaction(); 
        //dump($id);
        $dislay_result = DB::table('article')->where('id',$id)->value('display');
        if ($dislay_result == 1) {
            DB::table('article')->where('id',$id)->update(['display'=>0]);
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功'); 
        }
    }
}
