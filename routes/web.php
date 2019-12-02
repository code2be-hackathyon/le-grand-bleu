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

Route::get('/', 'AreaController@getAllName');

Route::get('/getAllArea', 'AreaController@getAll');

Route::get('/getAllDayData', 'DayDataController@getAll');

Route::get('/testAPIWeather', 'DayDataController@getAPIData');

