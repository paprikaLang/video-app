<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    //后台登录
    Route::get('/login', 'EntryController@loginForm');
    // video.test/admin/login => Admin\EntryController
});