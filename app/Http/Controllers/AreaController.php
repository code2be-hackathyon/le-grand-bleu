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
    public function getAllData()
    {
        $areaData = json_decode($this->getAll(), true);
        $areaDataC = [];
        foreach($areaData as $oneArea)
        {
            array_push($areaDataC,$oneArea);
        }
        return $areaDataC;
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
    public function getAllId()
    {
        $areaData = json_decode($this->getAll(), true);
        $areaId = [];

        foreach ($areaData as $oneArea)
        {
            array_push($areaId,$oneArea["area_id"]);
        }
        //return view('welcome',['areaName'=>$areaName]);
        return $areaId;
    }
}
