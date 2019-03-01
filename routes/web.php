<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 
加载后台模板
*/
Route::get('admin','Admin\IndexController@index');
<<<<<<< HEAD
Route::get('admin/users/setdata','Admin\UserController@setdata');

//用户管理
Route::resource('admin/users','Admin\UserController');


=======

Route::get('admin/users/setdata','Admin\UserController@setdata');


//用户管理
Route::resource('admin/users','Admin\UserController');

>>>>>>> remotes/origin/changgao
//子分类
Route::get('admin/cates/create/{id}','Admin\catesController@create');


//分类管理
Route::resource('admin/cates','Admin\CatesController');


<<<<<<< HEAD
=======
// 前台 分类
Route::resource('home/index','Home\IndexController');
>>>>>>> remotes/origin/changgao












<<<<<<< HEAD





=======
Route::prefix('admin')->namespace('Admin')->group(function () {
    //后台首页
    $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('admin.logout');
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    //后台首页
    $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('admin.logout');
    Route::middleware('auth.admin:admin')->name('admin.')->group(function () {
        Route::get('/', 'LoginController@index');
    });
});

// 后台登录
Route::resource('admin/login','Admin\LoginController');

// gg
// Route::get('admin/advert/create','Admin\catesController@create');

// 广告

Route::resource('admin/advert','Admin\AdvertController');
>>>>>>> remotes/origin/changgao









<<<<<<< HEAD




































































Route::get('home/login','Home\IndexController@login');

Route::post('home/index/dologin','Home\IndexController@dologin');

//前台  注册
Route::resource('home/register','Home\RegisterController');
// 前台 分类
Route::resource('home/index','Home\IndexController');


//友情链接管理
Route::resource('admin/link','Admin\LinkController');

=======
>>>>>>> remotes/origin/changgao
