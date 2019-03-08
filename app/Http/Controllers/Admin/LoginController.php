<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\ThrottlesLogins; 
use Illuminate\Foundation\Auth\AuthenticatesUsers; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;

use App\Models\Users;
use App\Models\admin_user;
use Hash;
use DB;

use Auth;
class LoginController extends Controller
{   

    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $redirectTo = '/admin/index'; 
    protected $username;

    public function __construct() 
    { 
        $this->middleware('guest:admin', ['except' => 'logout']); 
        $this->username = config('admin.global.username'); 
    } 

    

    public function index()
    {
        // echo "aaaa";exit;
        //echo 1;
        return view('admin.login.index');
    }

    protected function guard() 
    { 
        return auth()->guard('admin'); 
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
        
        $uname = $_POST['uname'];
        $password = $_POST['password'];

        $data = admin_user::where('uname',$uname)->first();

        if ($data = false){
            return redirect()->route('admin.login',['error'=>'404']);
        }

        $pass = $data['password'];

        if (Hash::check($password,$pass)) {
            echo "ky";
        }else{
            return redirect()->route('admin.login',['error'=>'404']);
        }

        session(['login.'.'1' => $pass,'login.'.'2' => $uname]);

        if (session()->exists('login')) {
            return redirect('admin');        
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->forget($this->guard()->getName());
        $request->session()->regenerate();
        return redirect('/admin');
    }

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