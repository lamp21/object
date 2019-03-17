<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Advert;
use App\Models\Announcement;
use DB;
use App\Models\Home_Users;
use App\Models\Usersinfo;
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
        $data_advert = Advert::limit(6)->get();
        $data_announcement = Announcement::limit(5)->get();
        // dd($data_announcement);
        $data = Controller::cates_data();
        $show = DB::table('wonderful')->get();
        $default = DB::table('wordphoto')->limit(5)->get();
        
        return view('home.index.index',['cates_data'=>$data,'data_advert'=>$data_advert,'data_announcement'=>$data_announcement,'show'=>$show,'default'=>$default]);
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
     * //网站公告详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $data_announcement = Announcement::find($id);
        $data_announcement = DB::table('announcement')->where('id',$id)->get();
        // dd($data_announcement);
        $cates_data = Controller::cates_data();
        return view('home.detail.detail',['cates_data'=>$cates_data,'data_announcement'=>$data_announcement]);
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
 
    public function wonderful($id)
    {
        
    }
}







