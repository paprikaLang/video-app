<?php

Route::group(['prefix' => 'admin'], function (){
    Route::get('/abs', function (){
        return 'abss';
    });
});