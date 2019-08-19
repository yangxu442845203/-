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
//后台登录和退出
Route::resource("/adminlogin","Admin\AdminLoginController");

//后台路由组
Route::group(["middleware"=>"adminlogin"],function(){
	//后台首页
	Route::resource("/admin","Admin\AdminController");
	//会员模型模块
	Route::resource("/adminuser","Admin\UserController");
	//获取会员详情信息
	Route::get("/userinfo/{id}","Admin\UserController@userinfo");
	//获取会员收货地址
	Route::get("/useraddress/{id}","Admin\UserController@useraddress");
	//后台无限分类
	Route::resource("/admincates","Admin\CateController");
	//管理员模块路由
	Route::resource("/adminusers","Admin\AdminuserController");
	//分配角色
	Route::get("/adminuserrole/{id}","Admin\AdminuserController@adminuserrole");
	//保存角色
	Route::post("/saverole","Admin\AdminuserController@saverole");
	//角色管理
	Route::resource("/role","Admin\RoleController");
	//分配权限
	Route::get("/adminauth/{id}","Admin\RoleController@adminauth");
	//保存权限
	Route::post("/saveauth","Admin\RoleController@saveauth");
	//权限管理
	Route::resource("/auth","Admin\AuthController");
	//公告模块
	Route::resource("/adminarticle","Admin\ArticleController");
	//Ajax 删除
	Route::get("/articledel","Admin\ArticleController@del");
	//
	Route::resource("/adminshop","Admin\ShopController");
});

//前台邮件测试 原始字符串
Route::get("/sendmail","Home\RegisterController@sendmail");
//前台邮件测试2 发送视图
Route::get("/sendmail1","Home\RegisterController@sendmail1");
//测试生成校验码
Route::get("/code","Home\RegisterController@code");
//前台注册 邮箱
Route::resource("/homeregister","Home\RegisterController");
//前台注册 手机
Route::post("/registerphone","Home\RegisterController@registerphone");
//检测手机号是否唯一
Route::get("/checkphone","Home\RegisterController@checkphone");
//发送短信校验码
Route::get("/registersendphone","Home\RegisterController@registersendphone");
//检测校验码
Route::get("/checkcode","Home\RegisterController@checkcode");
//激活用户
Route::get("/jihuo","Home\RegisterController@jihuo");
//前台登录
Route::resource("/homelogin","Home\HomeLoginController");
//忘记密码
Route::get("/forget","Home\HomeLoginController@forget");
Route::post("/doforget","Home\HomeLoginController@doforget");
//加载密码重置模板
Route::get("/reset","Home\HomeLoginController@reset");
//重置密码 密码修改
Route::post("/doreset","Home\HomeLoginController@doreset");
//前台首页
Route::resource("/homeindex","Home\IndexController");


// demo
Route::get("/qqq","Home\HomeLoginController@qqq");