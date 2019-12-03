<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;
//use App\Http\Controllers\Controller;

class ViewController extends Controller
{


    public function getView()
    {

        $areaNames = app('App\Http\Controllers\AreaController')->getAllName(); // get names of Area for the form
        //TODO next step is import data into the array
        return view('welcome',["areaNames" => $areaNames]);
    }

}
