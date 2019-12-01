<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DayData;
class DayDataController extends Controller
{
    public function index()
    {
        //
    }

    public function getAll()
    {
        return DayData::all();
    }

    public function getAPIData()
    {
            $res = \cache()->remember('getAPIData', now()->addDay(), static function () {
                $url = 'https://api.stormglass.io/v1/weather/point?lat=46.4666&lng=-1.7395&params=windSpeed,windDirection,swellHeight';
                $opts = [
                    'http' => [
                        'method' => "GET",
                        'header' => "Authorization: 683a383a-1391-11ea-acaf-0242ac130002-683a3966-1391-11ea-acaf-0242ac130002",
                    ],
                ];
                $context = stream_context_create($opts);
                $file = file_get_contents($url, false, $context);

                return json_decode($file);
            });
            return \response()->json($res);
    }
}
