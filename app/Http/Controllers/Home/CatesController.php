<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home_Users;
use App\Models\Usersinfo;
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
        // $count = $request->input('count',5);
        // $search = $request->input('search','');
        // $data = Home_Users::where('uname','like','%'.$search.'%')->paginate($count);
        // return view('admin.home_users.index',['data'=>$data,'request'=>$request->all()]);
         
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $data_create = Announcement::find($id);
        $data_create = DB::table('create')->where('id',$id)->get();
        // dd($data_create);
        // //读取session中的id
        $id = session('userinfo')->id;
        $userinfo = new Wonderful;
        $about_data = Wonderful::where('id',$id)->get();
        foreach ($about_data as $k => $v) {
            $value = $v;
        }
        $cates_data = Controller::cates_data();
        return view('home.cates.index',['cates_data'=>$cates_data,'data_create'=>$data_create,'value'=>$value]);
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
