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

use Illuminate\Support\Facades\Route;

Route::get('/', 'AreaController@getAllName');

Route::get('/getAllArea', 'AreaController@getAll');

Route::get('/getAllDayData', 'DayDataController@getAll');

Route::get('/testAPIWeather', 'DayDataController@getAPIData');

Route::get('/getOneHour/{hour}', 'DayDataController@getOneHourData');
Route::get('/getOneHour', 'DayDataController@getOneHourData');

Route::get('/getOneSwellHeight/{hour}', 'DayDataController@getSwellHeightFromHour');
Route::get('/getOneSwellHeight', 'DayDataController@getSwellHeightFromHour'); //return the default value (today at midday)

Route::get('/'.crypt("uriTest_zefgbbisfz165f","salt"),'DayDataController@putFromAPIWeather'); //just to test

