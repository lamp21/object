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
Route::get('admin/users/setdata','Admin\UserController@setdata');

//用户管理
Route::resource('admin/users','Admin\UserController');


//子分类
Route::get('admin/cates/create/{id}','Admin\catesController@create');


//分类管理
Route::resource('admin/cates','Admin\CatesController');

































































































Route::get('home/login','Home\IndexController@login');

Route::post('home/index/dologin','Home\IndexController@dologin');

//前台  注册
Route::resource('home/register','Home\RegisterController');
// 前台 分类
Route::resource('home/index','Home\IndexController');