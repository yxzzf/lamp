<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//后台
Route::get('/', function () {
    return view('welcome');
});
//用户列表

Route::resource('/admin/user','admin\UserController');

//地址列表
Route::resource('/admin/dizhi','admin\DizhiController');

// hello 

































// 轮播图
Route::resource('/admin/lunbo','admin\LunboController');
// 推荐位
Route::resource('/admin/tuijian','admin\TuijianController');
// 后台登录管理
Route::get('/admin/login','admin\LoginController@login');
//后台登录验证
Route::post('/admin/dologin','admin\LoginController@dologin');


























// 友情链接管理
Route::resource('/admin/links','admin\LinksController');

// 广告管理
Route::resource('/admin/guanggao','admin\GuanggaoController');

// 分类管理
Route::resource('/admin/cates','admin\CatesController');

// 商品管理
Route::resource('/admin/shops','admin\ShopsController');

//网站设置
Route::get('/admin/setting', 'admin\AdminController@setting');
Route::post('/admin/setting', 'admin\AdminController@update');

// 
Route::get('/','home\HomeController@index');