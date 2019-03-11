<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class WonderfulController extends Controller
{
    public static function getCates(){
       $cate_uid = DB::table('cates')->select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        foreach($cate_uid as $key => $value){
            // 统计 path 中的,符号 出现的次数
            $n = substr_count($value->path,',');
            // echo $n;
            // 重复 使用一个字符串
            $cate_uid[$key]->cname = str_repeat('|----',$n).$value->cname;
            }
            return $cate_uid;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载视图
        return view('admin.wonderful.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        //加载视图
        return view('admin.wonderful.create',['id'=>$id,'cate_uid'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //开启事务
        DB::beginTransaction();
        //dump($request->input('wd_img'));

        //添加数据到数据库
        // $wonderfuladd = DB::table('wonderful')->insert([
        //     'wd_img' => $request->input('wd_img'),
        //     'title' => $request->input('title'),
        //     'wd_form' => $request->input('wd_form'),
        //     'wd_time' => $request->input('wd_time'),
        //     'cate_uid' => $request->input('cate_uid'),
        //     'content' => $request->input('content'),
        //     'status' => $request->input('status'),
        //     ]);
        // if ($wonderfuladd) {
        //    // 执行 添加 
        //     DB::commit();
        //     return redirect('/admin/wonderful')->with('success','添加成功');
        // }else{
        //     DB::rollBack();
        //     return back()->with('error','添加失败');
        // }
        if($_FILES['wd_img']['error']>0){ 
            DB::rollBack();
            return back()->with('error','提交失败');
        }
        $dir='/public/admin_public/assets/img'; 
        $type=substr($_FILES['wd_img']['name'],strrpos($_FILES['wd_img']['name'],'.')); 
        $filename=time().rand(1000,9999).$type; 
        if(is_uploaded_file($_FILES['wd_img']['tmp_name'])){ 
            move_uploaded_file($_FILES['wd_img']['tmp_name'],$dir.$filename);
            DB::commit();
            return redirect('/admin/wonderful')->with('success','添加成功');
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
