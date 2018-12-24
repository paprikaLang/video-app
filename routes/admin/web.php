<?php

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