<?php

use Illuminate\Http\Request;

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

Route::middleware(['auth:api','cors'])->get('/user', function (Request $request) {
	dd('daedad');
    return $request->user();


});
	Route::get('/articles', 'fooController@index')->middleware('cors');
