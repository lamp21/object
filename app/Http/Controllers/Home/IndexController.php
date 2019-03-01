<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
class IndexController extends Controller
{   

    public static function getPidCates($pid = 0){
        //echo "aaa";
        $cates_data = Cates::where('pid',$pid)->get();//一级分类
        $array = [];
        foreach($cates_data as $key => $value){
            $value['sub'] = self::getPidCates($value->id);
            $array[] = $value;
        }
        return $array;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates_data = Cates::where('pid',0)->get();
        foreach($cates_data as $key => $value){
            $value['sub'] = Cates::where('pid',$value->id)->get();
            foreach($value['sub'] as $key2 => $value2){
                $value2['sub'] = Cates::where('pid',$value2->id)->get();
            }
        }
        return view('home.index.index',['cates_data'=>$cates_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

    //登录
    public function login(){
        return view('home.login.login');
    }


    public function dologin(Request $request){
        $data = $request->except(['_token']);
    }

}
