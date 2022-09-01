<?php

use App\Http\Controllers\TruckController;
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

Route::group(['prefix' => 'trucks'], function(){
    Route::get('/index', 'App\Http\Controllers\TruckController@index')->name('trucks.index');
    Route::get('/purchases', 'App\Http\Controllers\TruckController@purchases')->name('purchases.index');
    Route::put('/update', 'App\Http\Controllers\TruckController@update');
    Route::get('/create/{id}', 'App\Http\Controllers\TruckController@create')->name('trucks.purchase');
    Route::get('/buy/{id}', 'App\Http\Controllers\TruckController@buy')->name('trucks.buy');
    Route::delete('/delete', 'App\Http\Controllers\TruckController@destroy');
});

