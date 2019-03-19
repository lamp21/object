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
	session(['home_login'=>false]);
    return view('welcome');
});

/**
 
加载后台模板
*/

// 前台 分类
Route::resource('home/index','Home\IndexController');
Route::resource('home/index/cates','Home\CatesController');
// 有权限
// ['login','rbac']

// 无权限
// 'login'

// 后台 登录 测试
Route::group(['middleware'=>['login','rbac']],function()
{ 	
	// 后台 模板
	Route::get('admin','Admin\IndexController@index');
	// 后台 测试
	Route::get('admin/users/setdata','Admin\UserController@setdata');
	// 广告 列表
	Route::get('admin/advert/create','Admin\catesController@create');
	// 后台 角色的理由
	Route::get('admin/nodes/nodeadd','Admin\NodesController@nodeadd');
	Route::post('admin/nodes/insert','Admin\NodesController@insert');
	Route::resource('admin/nodes','Admin\NodesController');
	// 后台 权限的理由
	Route::get('admin/nodes/nodeadd','Admin\Nodes_qxlbController@create');
	Route::post('admin/nodes/insert','Admin\Nodes_qxlbController@insert');
	Route::resource('admin/nodes_qxlb','Admin\Nodes_qxlbController');
	// 用户管理
	Route::get('admin/users/role/{id}','Admin\Qx_UserController@edit');
	Route::post('admin/users/updaterole/{uid}','Admin\Qx_UserController@update');
	// 子分类
	Route::get('admin/cates/create/{id}','Admin\CatesController@create');
	// 添加 分类
	Route::get('admin/cates/create','Admin\CatesController@create');
	// 查看 子分类
	Route::get('admin/cates/{id}','Admin\CatesController@index');
	// 用户 管理
	Route::resource('admin/users','Admin\UserController');
	//后台 网站公告
	Route::resource('admin/announcement','Admin\AnnouncementController');
	//后台友情链接管理
	Route::resource('admin/link','Admin\LinkController');
	//后台精彩文章
	Route::resource('admin/wonderful','Admin\WonderfulController');
	// 广告
	Route::resource('admin/advert','Admin\AdvertController');
	// 分类 管理
	Route::resource('admin/cates','Admin\CatesController');
	//前台用户管理
	Route::resource('admin/home_users','Admin\Home_UsersController');
	//显示文章
	Route::get('admin/wonderful/{id}/change','Admin\WonderfulController@change');
	Route::get('admin/wonderful/{id}/dochange','Admin\WonderfulController@dochange');
	

	

	//后台精彩文章
	Route::resource('admin/wonderful','Admin\WonderfulController');
	//后台轮播图片上传
	Route::post('admin/wordphoto/upload','Admin\WordphotoController@upload');
	//后台文章审核列表
	Route::resource('admin/article','Admin\ArticleController');
	//后台文章审核
	Route::get('admin/article/{id}/edit','Admin\ArticleController@edit');
	Route::get('admin/article/{id}/doedit','Admin\ArticleController@doedit');
	//显示轮播图
	Route::get('admin/wordphoto/{id}/turn','Admin\WordphotoController@turn');
	Route::get('admin/wordphoto/{id}/doturn','Admin\WordphotoController@doturn');

}); 
// 登录 首页
Route::get('login','Admin\LoginController@login');
// 后台 退出
Route::any('/logout', 'Admin\LoginController@logout');
// 登录 验证
Route::post('admin/dologin','Admin\LoginController@dologin');
// 报错
Route::get('404',function(){
	return view('admin.nodes.404');
});
//轮播图片上传
Route::post('admin/wordphoto/upload','Admin\WordphotoController@upload');
//精彩文章封面图上传
Route::post('admin/wonderful/upload','Admin\WonderfulController@upload');









	























//前台精彩文章
Route::resource('home/wonderful','Home\WonderfulController');
//显示文章
Route::get('admin/wonderful/{id}/change','Admin\WonderfulController@change');
Route::get('admin/wonderful/{id}/dochange','Admin\WonderfulController@dochange');

//前台轮播文章详情
Route::resource('home/wordphoto','Home\WordphotoController');
//前台精彩文章
Route::resource('home/wonderful','Home\WonderfulController');
//前台 分类
Route::get('home/cates/{$id}','Home\CatesController@show');






//前台我的文章
Route::resource('home/article','Home\ArticleController');

//后台文章审核列表
Route::resource('admin/article','Admin\ArticleController');
//后台文章审核
Route::get('admin/article/{id}/edit','Admin\ArticleController@edit');
Route::get('admin/article/{id}/doedit','Admin\ArticleController@doedit');

//后台文章展示
Route::get('admin/article/{id}/display','Admin\ArticleController@display');
Route::get('admin/article/{id}/dodisplay','Admin\ArticleController@dodisplay');
//前台文章评论
Route::resource('home/message','Home\MessageController');
//后台精彩文章
Route::resource('admin/wonderful','Admin\WonderfulController');
//后台轮播图
Route::resource('admin/wordphoto','Admin\WordphotoController');


































   











Route::group(['middleware'=>'home_login'],function(){
	//用户头像上传
	Route::post('home/about/upload','Home\AboutController@upload');
	//用户个人信息
	Route::resource('home/about','Home\AboutController');
	//前台友情链接列表
	Route::resource('home/link','Home\LinkController');
	//前台发表文章
	Route::resource('home/article','Home\ArticleController');
	// 前台 广告 申请
	Route::resource('home/create','Home\AdvertController');
	// 前台 广告 申请
	Route::resource('home/advert','Home\AdvertController');
	//用户修改密码
	Route::resource('home/repassword','Home\RepasswordController');
	//前台我的文章
	Route::resource('home/article','Home\ArticleController');
});
// 前台 登录
Route::get('home/login','Home\LoginController@login');
Route::any('home/dologin','Home\LoginController@dologin');
// 前台  注册
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
Route::resource('home/register','Home\RegisterController');
//退出登录
Route::any('/home/logout', 'Home\LoginController@logout');
//读取全部session的值
Route::any('123',function(){
	dump(session()->all());
});




