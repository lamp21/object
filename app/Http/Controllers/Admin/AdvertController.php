<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\AdvertStoreRequest;

use App\Models\Advert;

use DB;
class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $data = Advert::where('content','like','%'.$search.'%')->paginate($count);

        return view('admin.advert.advert',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.advert.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(AdvertStoreRequest $request)
    {   
        //dd($request->all());
        //
        // DB::beginTransaction();
        
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
            
            return redirect('/admin/advert')->with('success','添加成功');
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
        
        $advert = Advert::find($id);
        //审核通过
        //echo $id;
        $change = DB::table('advert')->find($id);
        //dump($change); 
        $change_advert['advert_agree'] = $change->advert_agree;
        //dd($change_link);
            
        DB::table('advert')->where('id',$id)->update(['advert_agree' => 1]);
        return redirect($_SERVER['HTTP_REFERER'])->with('SUCCESS','通过审核');

        // $advert = Advert::find($id);

        // return view('admin.advert.edit',['advert'=>$advert]);
        
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
        // DB::beginTransaction();
        // dump($request->all());exit;
        // echo $id;
        $advert = Advert::find($id);
        // $file = $advert->file('pic','');
        
        // dump($_FILES['pic']['name']);exit;
        // 执行 图片上传
        if(!empty($_FILES['pic']['name'])){
            // echo 1;
            $advert->pic = $request->input('pic','');
            $advert->pic = $request->pic->store('');
        }

        // exit;
        $advert->url = $request->input('url','');
        $advert->content = $request->input('content','');

        $res = $advert->save();
        if($res){
        // 执行 添加 
            // DB:commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','修改成功');
        }else{
            // DB::rollBack();
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
       $res = Advert::destroy($id);
       // $res
       if($res){
        // 执行 删除
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}