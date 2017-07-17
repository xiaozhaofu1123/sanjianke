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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'hello get提交';
});

Route::post('/test', function () {
    return 'hello post提交';
});

Route::put('/test', function () {
    return 'hello put提交';
});

Route::delete('/test',function() {
    return 'hello delete提交';
});

//多种请求路由
Route::match(['get','post','put'], '/aa', function () {
    return 'hello 多重注册路由';
});

Route::get('/demo/{id?}',function($id = null)
{
    return 'hello'.$id;
})->where('id','[0-9a-z]+');

//控制器
Route::get('/demo1','admin\UserController@create');
Route::get('/demo1','admin\UserController@phpinfo');

// 资源路由
Route::resource('/user','admin\demoController');


// Route::get('/demo2','admin\AdminController@index');


//=============文件上传=============

Route::get('/uploads','admin\UploadsController@index');
Route::post('/doUploads','admin\UploadsController@doUploads');

//==================后台登陆==========================
Route::get('admin/login','admin\LoginController@index');

Route::post('admin/login','admin\LoginController@doLogin');

//ajax登录验证
Route::get('admin/ajax','admin\LoginController@doAjax');

 //===========================此处login为Kernel中被定义的的login==========
Route::group(['prefix' => 'admin', 'middleware' => 'login'], function(){
    //=============后台首页===========================
    Route::get('/demo2', 'admin\AdminController@index');
    //===========模板继承,添加用户==============
    Route::resource('users','admin\UsersController');
    //用户批量删除
    Route::post('usersdel','admin\UsersController@del');
    //添加验证码
    Route::get('capth2/{tmp}', 'admin\UsersController@capth');

    //=============后台退出=============================
    Route::get('/over', 'admin\AdminController@over');
    //=============后台视频分类===========================
    Route::resource('/video','admin\VideoController');
    Route::post('videodel', 'admin\VideoController@del');


    //=============后台分类===========================
    Route::resource('/type','admin\TypeController');
    //=============后台子分类===========================
    Route::get('typeSon/{id}','admin\TypeController@createSon');
    Route::post('typeSon','admin\TypeController@doAddSon');
    // =============广告分类=============================
    Route::resource('/adv','admin\AdvController');
    //后台友情链接
    Route::resource('/link','admin\LinkController');


});
//验证码
Route::get('admin/capth/{tmp}', 'admin\LoginController@capth');
