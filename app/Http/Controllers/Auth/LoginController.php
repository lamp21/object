<?php

<<<<<<< HEAD
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
=======
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
>>>>>>> remotes/origin/changgao

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $redirectTo = '/home';
=======
    protected $redirectTo = '/admin';
>>>>>>> remotes/origin/changgao

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->middleware('guest')->except('logout');
    }
}
=======
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    protected function guard()
    {
        return auth()->guard('admin');
    }

    /**
     * 后台管理员退出跳转到后台登录页面
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }
    protected function attemptLogin(Request $request)
    {
        $username = $request->input('uname');
        $password = $request->input('password');

        // 验证用户名登录方式
        $usernameLogin = $this->guard()->attempt(
            ['uname' => $username, 'password' => $password];
        );
        if ($usernameLogin) {
            return true;
        }
    //     // 验证手机号登录方式
    //     $mobileLogin = $this->guard()->attempt(
    //         ['mobile' => $username, 'password' => $password], $request->has('remember')
    //     );
    //     if ($mobileLogin) {
    //         return true;
    //     }

    //     // 验证邮箱登录方式
    //     $emailLogin = $this->guard()->attempt(
    //         ['email' => $username, 'password' => $password], $request->has('remember')
    //     );
    //     if ($emailLogin) {
    //         return true;
    //     }
    //     return false;
    // }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function username()
    {
        return 'username';
    }
}
>>>>>>> remotes/origin/changgao
