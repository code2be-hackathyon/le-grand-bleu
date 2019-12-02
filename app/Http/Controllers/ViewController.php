<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class ViewController extends Controller
{
    public $data = [];
    public function getView()
    {
        return view('welcome',$this->data);
    }
}
