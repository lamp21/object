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
	session(['admin_login'=>false]);
	session(['home_login'=>true]);
    return view('welcome');
});

/**
 
加载后台模板
*/

// 前台 分类
Route::resource('home/index','Home\IndexController');

// Route::group(['middleware'=>['login','rbac']],function()

// 后台 登录 测试
Route::group(['middleware'=>'login'],function()
{ 	
	Route::any('/logout', 'Admin\LoginController@logout');
	// 后台 模板
	Route::get('admin','Admin\IndexController@index');
	// 后台 测试
	Route::get('admin/users/setdata','Admin\UserController@setdata');
	// 用户 管理
	Route::resource('admin/users','Admin\UserController');
	//后台 网站公告
	Route::resource('admin/announcement','Admin\AnnouncementController');
	//后台友情链接管理
	Route::resource('admin/link','Admin\LinkController');
	//后台精彩文章
	Route::resource('admin/wonderful','Admin\WonderfulController');
	// 广告 列表
	Route::get('admin/advert/create','Admin\catesController@create');
	// 广告
	Route::resource('admin/advert','Admin\AdvertController');
	// 用户管理
	Route::resource('admin/users','Admin\UserController');
	// 广告列表
	Route::get('admin/advert/create','Admin\catesController@create');
	// 广告
	Route::resource('admin/advert','Admin\AdvertController');
	// 后台 权限的理由
	Route::get('admin/nodes/nodeadd','Admin\NodesController@nodeadd');
	Route::post('admin/nodes/insert','Admin\NodesController@insert');
	Route::resource('admin/nodes','Admin\NodesController');
	// 用户管理
	Route::get('admin/users/role/{id}','Admin\UserController@role');
	Route::post('admin/users/updaterole/{uid}','Admin\UserController@updaterole');
	// 子分类
	Route::get('admin/cates/create/{id}','Admin\CatesController@create');
	// 添加 分类
	Route::get('admin/cates/create','Admin\CatesController@create');
	// 查看 子分类
	Route::get('admin/cates/{id}','Admin\CatesController@index');
	// 分类管理
	Route::resource('admin/cates','Admin\CatesController');

}); 
// 登录 首页
Route::get('login','Admin\LoginController@login');

// 登录 验证
Route::post('admin/dologin','Admin\LoginController@dologin');
// 退出 验证
Route::post('admin/logout','Admin\LoginController@logout');

// 发错
Route::get('404',function(){
	return view('admin.nodes.404');
});

// 前台 广告 申请
Route::resource('home/create','Home\AdvertController');

// 前台 广告 申请
Route::resource('home/advert','Home\AdvertController');





















//前台友情链接列表
Route::resource('home/link','Home\LinkController');

//前台发表文章
Route::resource('home/article','Home\ArticleController');
//前台精彩文章
Route::resource('home/wonderful','Home\WonderfulController');
//后台精彩文章
Route::resource('admin/wonderful','Admin\WonderfulController');
//封面图上传
Route::post('admin/wonderful/upload','Admin\WonderfulController@upload');








































   











// 前台 登录
Route::get('home/login','Home\LoginController@login');
Route::any('home/dologin','Home\LoginController@dologin');
// 前台  注册
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
Route::resource('home/register','Home\RegisterController');
//退出登录
Route::any('/home/logout', 'Home\LoginController@logout');
// 前台 分类
Route::resource('home/index','Home\IndexController');
//前台用户管理
Route::resource('admin/home_users','Admin\Home_UsersController');
//用户头像上传
Route::post('home/about/upload','Home\AboutController@upload');
//用户个人信息
Route::resource('home/about','Home\AboutController');
//读取全部session的值
Route::any('123',function(){
	dump(session()->all());
});




