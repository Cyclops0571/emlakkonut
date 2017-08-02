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

Auth::routes();

Route::get('/', function ()
{
    return view('auth/login');
});

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/projects', 'HomeController@projects')->name('projects');
    Route::get('/postures/{project}', 'HomeController@postures')->name('postures');
    Route::get('/parcels/{project}', 'HomeController@parcels')->name('parcels');
    Route::get('/floors/{project}', 'HomeController@floors')->name('floors');
    Route::get('/apartmentslarlar', 'HomeController@apartments')->name('apartments');
    Route::get('/location', 'HomeController@location')->name('location');
    Route::get('/projectDesigner/{project}', 'DesignerController@project')->name('projectDesigner');
    Route::get('/parcelDesigner/{parcel}', 'DesignerController@parcel')->name('parcelDesigner');
    Route::get('/parcelDesigner/{floor}', 'DesignerController@floor')->name('floorDesigner');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/interactivity/project', 'InteractiveController@project')->name('projectInteractivity');
    Route::post('/interactivity/parcel', 'InteractiveController@parcel')->name('parcelInteractivity');

    Route::post('photo', 'PhotoController@store')->name('photo.store');
    Route::post('photo/parcel', 'PhotoController@parcelStore')->name('photo.parcelStore');
    Route::post('photo/floor/{project}', 'PhotoController@floorStore')->name('photo.floorStore');
});


Route::get('test', 'TTestController@index');
