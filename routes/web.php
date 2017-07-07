<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/projects', 'HomeController@projects')->name('projects');
Route::get('/postures', 'HomeController@postures')->name('postures');
Route::get('/parcels', 'HomeController@parcels')->name('parcels');
Route::get('/floors', 'HomeController@floors')->name('floors');
Route::get('/apartments', 'HomeController@apartments')->name('apartments');
Route::get('/location', 'HomeController@location')->name('location');