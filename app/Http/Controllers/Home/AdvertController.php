<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\Advert;
use DB;
use App\Models\Home_Users;
use App\Models\Usersinfo;
class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //读取session中的id
        $id = session('userinfo')->id;
        $userinfo = new Usersinfo;
        $about_data = Usersinfo::where('uid',$id)->get();
        foreach ($about_data as $k => $v) {
            $value = $v;
        }
        $a = Controller::cates_data();
        return view('home.advert.advert',['cates_data'=>$a,'value'=>$value]);
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
        //dd($request);
        DB::beginTransaction();
        
        $data = $request->except(['_token']);
        //dump($data);
        $advert = new Advert;
        
        // $advert->pic = $data['pic'];
        $advert->url = $data['url'];
        $advert->content = $data['content'];
        // $path = $request->file('pic')->storeAs('public/img/', $advert->advert()->id);
        $file = $request->file('pic');
        //dump($file);exit;
        // 执行 图片上传
        $advert->pic = $request->pic->store('');
        //dump($advert);
        if($advert->save()){
        // 执行 添加
            return redirect('/home/index')->with('success','添加成功');
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
        //
    }
}
