<?php

use App\Model\Wzkgs;
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


//后台管理
Route::get('/', function () {
    return view('welcome');
});
//用户列表

Route::resource('/admin/user','admin\UserController');

//地址列表
Route::resource('/admin/dizhi','admin\DizhiController');

//后台用户登录
Route::get('admin/login','admin\LoginController@login');

//后台登录验证
Route::post('/admin/dologin','admin\LoginController@dologin');

//个人中心
Route::get('/home/grzx','home\GrzxController@index');

//前台注册
Route::get('/home/zhuce','home\LogController@zhuce');

//注册操作
Route::post('/home/store','home\LogController@store');

//前台登录
Route::get('/home/denglu','home\LogController@denglu');

//登录操作
Route::post('/home/dlg','home\LogController@dlg');

//商品包装
Route::resource('/admin/baozhuang','admin\BaozhuangController');

//商品口味
Route::resource('/admin/kow','admin\KowController');






































// 轮播图
Route::resource('/admin/lunbo','admin\LunboController');
// 推荐位
Route::resource('/admin/tuijian','admin\TuijianController');




























// 友情链接管理
Route::resource('/admin/links','admin\LinksController');

// 广告管理
Route::resource('/admin/guanggao','admin\GuanggaoController');

// 分类管理
Route::resource('/admin/cates','admin\CatesController');

// 商品管理
Route::resource('/admin/shops','admin\ShopsController');

// 网站设置
Route::get('/admin/setting', 'admin\AdminController@setting');
Route::post('/admin/setting', 'admin\AdminController@update');

//网站开关
Route::resource('/admin/wzkgs','admin\WzkgsController');

// 标签管理
Route::resource('/admin/tag','admin\TagController');

// 前台首页
$wzkgs = Wzkgs::find(1);
if($wzkgs['kg'] == 1){
	Route::get('/','home\HomeController@index');
}else{
	Route::get('/','home\HomeController@modify');
}