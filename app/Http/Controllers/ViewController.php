<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
//use App\Http\Controllers\Controller;

class ViewController extends Controller
{


    public function getView($id = 1)
    {


        $dayData = app('App\Http\Controllers\DayDataController')->getAllDataById($id);

        $areaData = app('App\Http\Controllers\AreaController')->getAllData();

        var_dump($areaData);
        return view('welcome',["areaData" => $areaData],["dayData" => $dayData]);
    }

}
