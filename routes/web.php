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

Route::get('/', 'ViewController@getView');

Route::get('/getAllArea', 'AreaController@getAll');

Route::get('/getAllDayData', 'DayDataController@getAll');

Route::get('/testAPIWeather/{lat}&{lng}', 'DayDataController@getAPIData');
Route::get('/testAPIWeather', 'DayDataController@getAPIData'); //only return json for L'Anse du vieu Moulin 's location

Route::get('/getOneHour/{hour}', 'DayDataController@getOneHourData');
Route::get('/getOneHour', 'DayDataController@getOneHourData');

Route::get('/getOneSwellHeight/{hour}', 'DayDataController@getSwellHeightFromHour');
Route::get('/getOneSwellHeight', 'DayDataController@getSwellHeightFromHour'); //return the default value (today at midday)

Route::get('/'.crypt("uriTest_zefgbbisfz165f","salt"),'DayDataController@putAPIDataByLocation'); //just to test

Route::get('/findAreaId/{lat}&{lgn}', "DayDataController@findAreaId"); // test route




