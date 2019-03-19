<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home_Users;
use App\Models\Article;
use App\Models\Wonderful;
use DB;
class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        dd($id);
        
        // return view('home.cates.index');
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
        echo $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // echo $id;
        // 接收  ID
        $data_create = DB::table('cates')->where('id',$id)->get();
        // 链接 article UID
        $about_data = DB::table('article')->where('cate_uid',$id)->get();
        if($about_data->first() != null){
            foreach ($about_data as $k => $v){
            $value = $v;
            }
        }else{
            $value = '';
        }

        $cates_data = Controller::cates_data();
        return view('home.cates.index',['cates_data'=>$cates_data,'about_data'=>$about_data,'data_create'=>$data_create,'value'=>$value]);
        
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
        echo $id;
        return view('home.cates.index');
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
        echo $id;
        return view('home.cates.index');
    }

    public function dmxy($id){
        echo $id;
    }
}
