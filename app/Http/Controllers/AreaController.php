<?php

namespace App\Http\Controllers;

use App\Area;
//use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function getAll()
    {
        var_dump(crypt("uriTest_zefgbbisfz165f","salt"));
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
//        return $areaName;
        return view('welcome',['areaName'=>$areaName]);
    }
}
