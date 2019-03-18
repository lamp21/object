<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Http\Requests\AnnouncementRequest;
use DB;
class AnnouncementController extends Controller
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
        $data = Announcement::where('announcement_title','like','%'.$search.'%')->paginate($count);
        //加载视图
        return view('admin.announcement.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {   

        /**
        *开启事务
        */
        DB::beginTransaction();
        $data = $request->except(['_token']);
        $announ = new Announcement;
        $announ->announcement_title = $data['announcement_title'];
        $announ->announcement_content = $data['announcement_content'];
        $res = $announ->save();
        if($res){
            DB::commit();
            return redirect('admin/announcement')->with('success','添加成功');
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
        $announcement = Announcement::find($id);
        // dd($announcement);
        return view('admin.announcement.edit',['announcement'=>$announcement]);
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
        $announcement = Announcement::find($id);
        $announcement->announcement_title = $request->input(['announcement_title']);
        $announcement->announcement_content = $request->input(['announcement_content']);
        $res = $announcement->save();
        if($res){
            DB::commit();
            return redirect('admin/announcement')->with('success','修改成功');
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

        $res = Announcement::destroy($id);
        if($res){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
