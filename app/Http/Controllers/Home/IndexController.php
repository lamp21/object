<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Advert;
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
<<<<<<< HEAD
=======

>>>>>>> 354196929f76f1e9df9ac59256e58bd7d9bb90f9
    {   
        $data_advert = Advert::all();
        //dump($data_advert);
        $data = Controller::cates_data();
        return view('home.index.index',['cates_data'=>$data,'data_advert'=>$data_advert]);
<<<<<<< HEAD
=======

    {
        $a = Controller::cates_data();

        return view('home.index.index',['cates_data'=>$a]);

        }
>>>>>>> 354196929f76f1e9df9ac59256e58bd7d9bb90f9
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

}
