<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WordphotoStoreRequest;
use App\Http\Requests\WordphotoUpdateRequest;
use App\Models\Wordphoto;

use DB;
class WordphotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $wordphoto = DB::table('wordphoto')->get();
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $wordphoto_info = Wordphoto::where('pic_title','like','%'.$search.'%')->paginate($count);

        return view('admin.wordphoto.index',['wordphoto_info'=>$wordphoto_info,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wordphoto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WordphotoStoreRequest $request)
    {
        //接收数据
        //dump($request->all());
        $pic = $this->upload($request);
        //dd($pic);
        //添加数据到数据库
        $wordphotoadd = DB::table('wordphoto')->insert([
            'pic' =>$pic ,
            'pic_title' => $request->input('pic_title'),
            'pic_form' => $request->input('pic_form'),
            'pic_time' => $request->input('pic_time'),
            'pic_content' => $request->input('pic_content'),
            'pic_status' => $request->input('pic_status'),
            ]);
        if ($wordphotoadd) {
           // 执行 添加 
            DB::commit();
            return redirect('/admin/wordphoto')->with('success','添加成功');
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
        //修改内容
        //dump($id);
        $photo_id = DB::table('wordphoto')->find($id);
        return view('admin.wordphoto.edit',['photo_id'=>$photo_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WordphotoUpdateRequest $request, $id)
    {
       //开启事务
        DB::beginTransaction();
        $upload_pic = $this->upload($request);
        //dump($upload_pic);
        $result = DB::table('wordphoto')->where('id',$id)->update([
            'pic' =>$upload_pic ,
            'pic_title' => $request->input('pic_title'),
            'pic_form' => $request->input('pic_form'),
            'pic_time' => $request->input('pic_time'),
            'pic_content' => $request->input('pic_content'),
            'pic_status' => $request->input('pic_status'),
        ]);
        if ($result) {
           // 执行 添加 
            DB::commit();
            return redirect('/admin/wordphoto')->with('success','修改成功');
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
        DB::beginTransaction(); 
        $del = DB::table('wordphoto')->where('id',$id)->delete();
        if($del){
                DB::commit();
                return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
            }else{
                DB::rollBack();
                return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
    public function upload(Request $request)
    {  
        //开启事务
        DB::beginTransaction();
        //接收数据
        $file = $request->file('pic');
        if($file->isValid()){
            //获取图片的后缀名
            $extension = $file->extension();

            //存储名称
            $newfile = md5(date('YmdHis').rand(1000,9999)).'.'.$extension;

            // 将文件上传到本地服务器
            //将文件从临时目录移动到制定目录
            $path = $file->move(public_path().'/upload',$newfile);
            //将上传文件的路径返回给客户端
            return '/upload/'.$newfile; 
        }
    }
    public function turn($id)
    {
         /**
        *开启事务
        */
        DB::beginTransaction(); 
        //dump($id);
        $res_info = DB::table('wordphoto')->where('id',$id)->value('pic_status');
        if ($res_info = 1) {
            DB::table('wordphoto')->where('id',$id)->update(['pic_status'=>2]);
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功'); 
        }

    }
    public function doturn($id)
    {
         /**
        *开启事务
        */
        DB::beginTransaction(); 
        //dump($id);
        $res_info = DB::table('wordphoto')->where('id',$id)->value('pic_status');
        if ($res_info = 2) {
            DB::table('wordphoto')->where('id',$id)->update(['pic_status'=>1]);
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功'); 
        }
    }
}
