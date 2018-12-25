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

    return redirect('/admin/login');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    //后台登录 video.test/admin/login => Admin\EntryController
    Route::get('/login', 'EntryController@loginForm');
    //登录处理
    Route::post('/login','EntryController@login');
    //登录成功后的页面
    Route::get('/index', 'EntryController@index');
    Route::get('/logout','EntryController@logout');
    Route::get('/changePassword', 'MyController@passwordForm');
    Route::post('/changePassword', 'MyController@changePassword');
    //资源控制器Tag
    Route::resource('tag','TagController');
    Route::resource('lesson','LessonController');
});
//include __DIR__.'/admin/web.php';