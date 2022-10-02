<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

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

Route::get('index', ['as' => 'trang_chu', 'uses' => 'App\Http\Controllers\FoodController@index']);
Route::get('chi_tiet_san_pham/{id}', ['as'=>'chi_tiet_san_pham', 'uses' => 'App\Http\Controllers\FoodController@show']);
Route::get('add_product', ['as'=>'them_san_pham', 'uses' => 'App\Http\Controllers\FoodController@create']);
Route::get('store', ['as'=>'store', 'uses' => 'App\Http\Controllers\FoodController@store']);
Route::get('edit/{id}', ['as'=>'edit', 'uses' => 'App\Http\Controllers\FoodController@edit']);





