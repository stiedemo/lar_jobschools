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


Route::get('/', ['as' => 'root', 'uses' => 'baseController@actionHome']);
Route::get('index.html', ['as' => 'index', 'uses' => 'baseController@actionHome']);
Route::get('login.html', ['as' => 'login', 'uses' => 'baseController@actionLogin'])->middleware('noLogin');
Route::post('login.html', ['as' => 'login', 'uses' => 'baseController@runLogin'])->middleware('noLogin');
Route::get('register.html', ['as' => 'register', 'uses' => 'baseController@actionRegister'])->middleware('noLogin');
Route::post('register.html', ['as' => 'register', 'uses' => 'baseController@runRegister'])->middleware('noLogin');


Route::group(['prefix' => 'manager', 'middleware' => ['Login'], 'as' => 'Manager.'], function() {
    Route::get('index.html', ['as' => 'index', 'uses' => 'baseController@actionHomeManager']);
    Route::get('logout.html', ['as' => 'logout', 'uses' => 'baseController@actionLogout']);
    
    Route::group(['prefix' => 'student', 'as' => 'Student.'], function() {
        Route::get('index.html', ['as' => 'index', 'uses' => 'studentManagerController@actionHomeManager']);
        Route::get('export-my-data.html',['as' => 'export', 'uses' => 'studentManagerController@exportStudenMe']);
        Route::post('import-my-data.html',['as' => 'import', 'uses' => 'studentManagerController@importStudenMe']);
    });
});
