<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/php', 'HomeController@phpInfo');
Route::group(['prefix'=>'/start'],function (){
    Route::get('/','StartController@index');
    Route::get('/get-json','StartController@getJson');
    Route::get('/data-chart','StartController@chartData');
    Route::get('/line-chart','StartController@lineData');
    Route::get('/socket-chart','StartController@newEvent');
    Route::get('/chat','StartController@chat');
});

