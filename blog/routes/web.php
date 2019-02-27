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
