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


Route::post('login', 'UserController@login');

Route::post('register', 'UserController@register');

//Route::post('details', 'UserController@details');


Route::group(['middleware' => 'auth:api'], function(){

    Route::post('bordados','BordadosController@store');
    Route::get('bordados','BordadosController@index');
    Route::post('bordados/{id}/like','LikeController@like' );
    Route::post('bordados/{id}/unlike','LikeController@unlike' );
  //  Route::get ('bordados/{user}','BordadosController@getAll');
   Route::get ('bordados/like' , 'LikeController@getAll');

});


 Route::get('/user', function (Request $request){ return $request->user()->id; })->middleware('auth:api');