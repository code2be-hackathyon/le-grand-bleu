<?php

namespace App\Http\Controllers;

use App\Area;
//use Illuminate\Http\Request;

class AreaController extends Controller
{
    public static function getAll()
    {
        return Area::all();
    }

    public function getAllName()
    {
        $areaData = json_decode($this->getAll(), true);
        $areaName = [];

        foreach ($areaData as $oneArea)
        {
            array_push($areaName,$oneArea["area_name"]);
        }
        //return view('welcome',['areaName'=>$areaName]);
        return $areaName;
    }
}
