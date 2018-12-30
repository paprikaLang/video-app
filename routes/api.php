<?php

use Illuminate\Http\Request;
header('Access-Control-Allow-Origin: *');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/component/video','Component\UploadController@video');

Route::group(['namespace' => 'Api'], function (){
    Route::get('tags','ContentController@tags');
    //lesson_id
    Route::get('lesson/{id}', 'ContentController@lesson');
    //tag
    Route::get('tlesson/{tid}', 'ContentController@tlesson');
    Route::get('commendLesson/{row}','ContentController@commendLesson');
    Route::get('hotLesson/{row}','ContentController@hotLesson');
    Route::get('videos/{lessonId}','ContentController@videos');
});















