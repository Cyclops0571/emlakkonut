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
    Route::get('/floors/{project}', 'FloorController@index')->name('floors');
    Route::get('/apartments/{project}', 'ApartmentController@index')->name('apartments');
    Route::get('/location/{project}', 'MapController@location')->name('location');
    Route::get('/projectDesigner/{project}', 'DesignerController@project')->name('projectDesigner');
    Route::get('/floorDesigner/{floor}', 'DesignerController@floor')->name('floorDesigner');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/interactivity/project', 'InteractiveController@project')->name('projectInteractivity');
    Route::post('/interactivity/floor', 'InteractiveController@floor')->name('floorInteractivity');

    Route::post('photo', 'PhotoController@store')->name('photo.store');
    Route::post('photo/floor/{project}', 'PhotoController@floorStore')->name('photo.floorStore');
    Route::post('photo/apartment', 'PhotoController@apartmentStore')->name('photo.apartmentStore');
    Route::post('map/save/', 'MapController@save')->name('mapSave');
    Route::post('ajax/floorsOfBlock', 'AjaxController@floorsOfBlock')->name('ajax.floorsOfBlock');

    // Save Docs
    Route::post('uploadFiles/{project}', 'ProjectController@uploadFiles')->name('uploadFiles');
    Route::post('addVideosUrl/{project}', 'ProjectController@addVideosUrl')->name('addVideosUrl');
    Route::post('add360Url/{project}', 'ProjectController@add360Url')->name('add360Url');
    

    Route::get('numarataj/{project}', 'NumberingController@index')->name('numbering.index');
    Route::get('numarataj/create/{project}', 'NumberingController@create')->name('numbering.create');
    Route::get('numarataj/edit/{numbering}', 'NumberingController@edit')->name('numbering.edit');
    Route::post('numarataj/store', 'NumberingController@store')->name('numbering.store');
    Route::post('photo/numbering', 'PhotoController@numberingStore')->name('photo.numberingStore');
    Route::post('/toggleNumberingStatus/{numbering}', 'NumberingController@toggleStatus')
    ->name('toggleNumberingStatus');
    Route::post('/deleteNumbering/{numbering}', 'NumberingController@delete')
    ->name('deleteNumbering');
    Route::get('/numberingDesigner/{numbering}', 'DesignerController@numbering')->name('numberingDesigner');
    Route::post('/interactivity/numbering', 'InteractiveController@pnumbering')->name('numberingInteractivity');

});

Route::get('setting', function (Setting $setting) {
    $setting->setSettings();

    return 'setup is ready';
});

Route::get('test', 'TTestController@index');