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
   echo '123';
    return view('welcome');
});

/**
 
加载后台模板
*/

// 子分类
Route::get('admin/cates/create/{id}','Admin\CatesController@create');

// 添加 分类
Route::get('admin/cates/create','Admin\CatesController@create');

// 查看 子分类
Route::get('admin/cates/{id}','Admin\CatesController@index');

// 分类管理
Route::resource('admin/cates','Admin\CatesController');

// 前台 分类
Route::resource('home/index','Home\IndexController');

// 后台 登录 测试
Route::prefix('admin')->namespace('Admin')->group(function () {
    // 后台 首页
    $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('admin.logout');
});

// 后台 登录 测试
Route::prefix('admin')->namespace('Admin')->group(function () {
    // 后台 首页
    $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('admin.logout');
    Route::middleware('auth.login:login')->name('admin.login.login')->group(function () {
        Route::get('/', 'LoginController@index');
    });
});

// 后台 登录 测试
Route::group(['namespace' => 'Auth','prefix'=>'auth'],function(){ 
    route::get('/login','AuthController@login'); 
    route::get('/logout','AuthController@getlogout'); 
    route::post('/login','AuthController@auth'); 
});

// 后台 登录
Route::resource('admin/login','Admin\LoginController');

// 广告 列表
Route::get('admin/advert/create','Admin\catesController@create');

// 广告
Route::resource('admin/advert','Admin\AdvertController');

// 用户管理
Route::resource('admin/users','Admin\UserController');

// 前台 广告 申请
Route::resource('home/create','Home\AdvertController');

// 前台 广告 申请
Route::resource('home/advert','Home\AdvertController');






// 子分类
Route::get('admin/cates/create/{id}','Admin\CatesController@create');

// 添加 分类
Route::get('admin/cates/create','Admin\CatesController@create');

// 查看 子分类
Route::get('admin/cates/{id}','Admin\CatesController@index');

// 分类管理
Route::resource('admin/cates','Admin\CatesController');










Route::group(['namespace' => 'Auth','prefix'=>'auth'],function(){ 
    route::get('/login','AuthController@login'); 
    route::get('/logout','AuthController@getlogout'); 
    route::post('/login','AuthController@auth'); 
});

// 后台登录
Route::resource('admin/login','Admin\LoginController');

// 广告列表
Route::get('admin/advert/create','Admin\catesController@create');

// 广告
Route::resource('admin/advert','Admin\AdvertController');




// 前台 广告 申请
Route::resource('home/create','Home\AdvertController');

// 前台 广告 申请
Route::resource('home/advert','Home\AdvertController');




















//后台友情链接管理
Route::resource('admin/link','Admin\LinkController');
//前台友情链接列表
Route::resource('home/link','Home\LinkController');

//前台发表文章
Route::resource('home/article','Home\ArticleController');
//前台精彩文章
Route::resource('home/wonderful','Home\WonderfulController');
//显示文章
Route::get('admin/wonderful/{id}/change','Admin\WonderfulController@change');
Route::get('admin/wonderful/{id}/dochange','Admin\WonderfulController@dochange');
//后台精彩文章
Route::resource('admin/wonderful','Admin\WonderfulController');
//精彩文章封面图上传
Route::post('admin/wonderful/upload','Admin\WonderfulController@upload');
//后台轮播图
Route::resource('admin/wordphoto','Admin\WordphotoController');
//轮播图片上传
Route::post('admin/wordphoto/upload','Admin\WordphotoController@upload');
















































// 后台 模板
Route::get('admin','Admin\IndexController@index');
// 后台 测试
Route::get('admin/users/setdata','Admin\UserController@setdata');
// 前台 登录
Route::get('home/login','Home\IndexController@login');
// 前台  注册
Route::resource('home/register','Home\RegisterController');
// 用户 管理
Route::resource('admin/users','Admin\UserController');
// 前台 分类
Route::resource('home/index','Home\IndexController');
//后台 网站公告
Route::resource('admin/announcement','Admin\AnnouncementController');
//用户头像上传
Route::post('home/about/upload','Home\AboutController@upload');
//用户个人信息
Route::resource('home/about','Home\AboutController');





