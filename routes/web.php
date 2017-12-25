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

use App\Model\Setting;

Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'ProjectController@projects');
    Route::get('/projects', 'ProjectController@projects')->name('projects');
    Route::post('/toggleProjectStatus/{project}', 'ProjectController@toggleStatus')->name('toggleProjectStatus');
    Route::get('/postures/{project}', 'HomeController@postures')->name('postures');
    Route::get('/parcels/{project}', 'ParcelController@parcels')->name('parcels');
    Route::post('/parcels/new/{project}', 'ParcelController@new')->name('newParcel');
    Route::post('/toggleParcelStatus/{parcel}', 'ParcelController@toggleStatus')->name('toggleParcelStatus');
    Route::get('/floors/{project}', 'FloorController@index')->name('floors');
    Route::get('/apartments/{project}', 'ApartmentController@index')->name('apartments');
    Route::get('/location/{project}', 'MapController@location')->name('location');
    Route::get('/projectDesigner/{project}', 'DesignerController@project')->name('projectDesigner');
    Route::get('/parcelDesigner/{parcel}', 'DesignerController@parcel')->name('parcelDesigner');
    Route::get('/floorDesigner/{floor}', 'DesignerController@floor')->name('floorDesigner');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/interactivity/project', 'InteractiveController@project')->name('projectInteractivity');
    Route::post('/interactivity/parcel', 'InteractiveController@parcel')->name('parcelInteractivity');
    Route::post('/interactivity/floor', 'InteractiveController@floor')->name('floorInteractivity');

    Route::post('photo', 'PhotoController@store')->name('photo.store');
    Route::post('photo/parcel', 'PhotoController@parcelStore')->name('photo.parcelStore');
    Route::post('photo/floor/{project}', 'PhotoController@floorStore')->name('photo.floorStore');
    Route::post('photo/apartment', 'PhotoController@apartmentStore')->name('photo.apartmentStore');
    Route::post('map/save/', 'MapController@save')->name('mapSave');
    Route::post('ajax/floorsOfBlock', 'AjaxController@floorsOfBlock')->name('ajax.floorsOfBlock');
    Route::post('numarataj/save', 'ParcelController@save')->name('numaratajSave');
});

Route::get('setting', function (Setting $setting) {
    $setting->setSettings();

    return 'setup is ready';
});

Route::get('test', 'TTestController@index');