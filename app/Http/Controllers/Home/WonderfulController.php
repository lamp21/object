<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Home_Users;
use App\Models\Usersinfo;
class WonderfulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //加载视图
        $a = Controller::cates_data();
        $articles = DB::table('wonderful')->get();
        //读取session中的id
        $id = session('userinfo')->id;
        $userinfo = new Usersinfo;
        $about_data = Usersinfo::where('uid',$id)->get();
        foreach ($about_data as $k => $v) {
            $value = $v;
        }
        return view('home.wonderful.wonderful',['cates_data'=>$a,'value'=>$value,'articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        dump($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $a = Controller::cates_data();
        $word = DB::table('wonderful')->where('id',$id)->get();
        // $message = DB::table('wonderful as oo')
        //     ->join('article as ww','uu.message_uid','=','ww.id')
        //     ->join('users_info as dd','uu.user_mid','=','dd.id')
        //     ->join('home_users as ff','ff.id','=','dd.uid')
        //     ->select('uu.message','dd.uname_img','ff.uname','uu.time_res')
        //     ->get();
        return view('home.wonderful.wordinfo',['cates_data'=>$a,'word'=>$word]);
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
        dd($id);
    }
}
