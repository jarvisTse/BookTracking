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

Route::post('/b/list', 'API\BooksController@list');
Route::get('b/detail/{id}', 'API\BooksController@detail');
Route::get('user/{id}', 'API\AuthController@getUser');
Route::get('/record/{id}', 'API\BooksController@record');
Route::post('/login', 'API\AuthController@login');
Route::post('/signup', 'API\AuthController@signup');

// Route::get('/b/list', 'API\BooksController@list');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
