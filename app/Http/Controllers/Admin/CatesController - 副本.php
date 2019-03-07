<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;
class CatesController extends Controller
{   
    public static function getCates(){
        $cates_data = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        foreach($cates_data as $key => $value){
            // 统计 path 中的,符号 出现的次数
            $n = substr_count($value->path,',');
            // echo $n;
            // 重复 使用一个字符串
            $cates_data[$key]->cname = str_repeat('|----',$n).$value->cname;

        }
        return $cates_data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $count = $request->input('count',5);
        $search = $request->input('search','');

        $fy_data = Cates::where('cname','like','%'.$search.'%')->paginate($count);

        $bolg = DB::table('cates')->where('pid',0)->get();
        foreach($bolg as $k=>$v){
            $bolg[$k]->two=DB::table('cates')->where('pid',$v->id)->get();
        }
        // dd($bolg);
        //显示模板
        return view('admin.cates.index',['cates_data'=>$bolg,'data'=>$fy_data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        // 显示添加页面
        return view('admin.cates.create',['id'=>$id,'cates_data'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $data = $request->all();

        // 处理 分类路径
        // 分类
        if($data['pid'] == 0){
            $data['path'] = 0;
        }else{            
            // 获取父级分类的信息
            $parent_data = Cates::find($data['pid']);
            // 获取分级分类 pid,id
            $data['path'] = $parent_data->path.','.$parent_data->id;
            
        }

        $cate = new Cates;
        $cate->cname = $data['cname'];
        $cate->pid = $data['pid'];
        $cate->path = $data['path'];
        if($cate->save()){
        // 执行 添加 
            return redirect('/admin/cates')->with('success','添加成功');
        }else{
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
        // 检查 当前分类下 是否有子分类
        $child_data = Cates::where('pid',$id)->first();
        if($child_data){
            return back()->with('error','当前分类下有子分类,不易删除');
        }
        // 执行删除
        if(Cates::destroy($id)){
            return redirect('/admin/cates')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
