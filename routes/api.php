<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::group(['prefix'=>'API'],function(){

//     Route::group(['prefix'=>'auth'],function(){
//         Route::post('login','UsersController@login');
//     });      
// });
Route::namespace('API')->group(function () {
    Route::post('login','UsersController@login');
});

Route::middleware('auth:api')->namespace('API')->group(function () {
    // Auth
    Route::prefix('users')->group(function(){
        // Route::get('/', function (Request $request) {
        //     return $request->user();
        // });
        Route::get('/','UsersController@index');
        Route::get('/{user}','UsersController@show');
        // Using other columns to retrieve data e.g name column
        // Route::get('/{user:name}','UsersController@show');
        Route::post('/store','UsersController@store');
        Route::post('/update/{id}','UsersController@update');
        Route::post('/{id}','UsersController@destroy');
    });

    // Posts
    Route::prefix('posts')->group(function(){
        Route::get('/','PostsController@index');
    });
});
