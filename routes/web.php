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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login',   'App\Http\Controllers\LoginController@authenticate');

Route::get('register', 'App\Http\Controllers\RegisterController@index')->name('register');
Route::post('register', 'App\Http\Controllers\RegisterController@register');

Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::post('logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::resource('users', 'App\Http\Controllers\UserController');