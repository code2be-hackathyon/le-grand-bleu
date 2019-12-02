<?php


namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\DayData;
use function cache;
use function response;


class DayDataController extends Controller
{
    public function index()
    {
        //

    }

    /**
     * @return DayData[]|Collection
     */
    public function getAll()
    {
        return DayData::all();
    }

    /**
     * @return JsonResponse
     * @throws Exception
     */
    public function getAPIData() //TODO make latitude & longitude as params connected to area's data so we will have as param $area
    {
        $res = cache()->remember('getAPIData', now()->addDay(), static function () {
            $url = 'https://api.stormglass.io/v1/weather/point?lat=46.4666&lng=-1.7395&params=windSpeed,windDirection,swellHeight';
            $opts = [
                'http' => [
                    'method' => "GET",
                    'header' => "Authorization: 683a383a-1391-11ea-acaf-0242ac130002-683a3966-1391-11ea-acaf-0242ac130002",
                ],
            ];
            $context = stream_context_create($opts);
            $file = file_get_contents($url, false, $context);

            return json_decode($file, true);
        });
        return response()->json($res);
    }

    /**
     * @param int $hour
     * @return mixed
     * @throws Exception
     */
    public function getOneHourData($hour=12)
    {
        $myJsonFile = $this->getAPIData();

        $jsonArray = json_decode($myJsonFile->content(),true);

        return $jsonArray["hours"][$hour];
    }

    /**
     * @param $hour
     * @return float|int
     * @throws Exception
     */
    public function getSwellHeightFromHour($hour=12)
    {
        $mySwellHeight = $this->getOneHourData($hour)["swellHeight"];
        $nbValue = 0;
        $moyValue = 0;
        foreach($mySwellHeight as $oneSource)
        {
            if($oneSource["source"] != "dwd")
            {
                $moyValue += $oneSource["value"];
                $nbValue ++;
            }
        }
        return $moyValue/$nbValue;

    }

    /**
     * @param int $hour
     * @return float|int
     * @throws Exception
     */
    public function getWindDirectionFromHour($hour=12)
    {
        $myWindDirection = $this->getOneHourData($hour)["windDirection"];
        $nbValue = 0;
        $moyValue = 0;
        foreach($myWindDirection as $oneSource)
        {
            if($oneSource["source"] != "dwd")
            {
                $moyValue += $oneSource["value"];
                $nbValue ++;
            }
        }
        return $moyValue/$nbValue;
    }

    /**
     * @param int $hour
     * @return float|int
     * @throws Exception
     */
    public function getWindSpeedFromHour($hour=12)
    {
        $myWindSpeed = $this->getOneHourData($hour)["windSpeed"];
        $nbValue = 0;
        $moyValue = 0;
        foreach($myWindSpeed as $oneSource)
        {
            if($oneSource["source"] != "dwd")
            {
                $moyValue += $oneSource["value"];
                $nbValue ++;
            }
        }
        return $moyValue/$nbValue;
    }

}
