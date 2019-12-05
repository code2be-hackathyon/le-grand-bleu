<?php


namespace App\Http\Controllers;

//use App\Area;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
//use Illuminate\Http\Request;
use App\DayData;
use Illuminate\Support\Facades\DB;
//use mysql_xdevapi\Table;
use stdClass;
use function cache;
use function response;


class DayDataController extends Controller
{
    public static $dayTest = 0;

    public function index()
    {
        //

    }

    /**
     * @return DayData[]|Collection
     */
    public static function getAll()
    {
        return DayData::all();
    }

    /**
     * @param $lat
     * @param $lng
     * @return JsonResponse
     * @throws Exception
     * get all API DATA
     */
    public function getAPIData($lat = 46.4666 , $lng= -1.7395) // Valeur par défaut = coordonnées de L'Anse du Vieux Moulin
    {
        $_SESSION["lat"] = $lat;
        $_SESSION["lng"] = $lng; // needed to put it in function
        $res = cache()->remember('getAPIData&'.$lat.'&'.$lng, now()->addDay(), static function () {
            $url = 'https://api.stormglass.io/v1/weather/point?lat='.$_SESSION["lat"].'&lng='.$_SESSION["lng"].'&params=windSpeed,windDirection,swellHeight';
            $opts = [
                'http' => [
                    'method' => "GET",
                    'header' => "Authorization:".config('stormglass.key'),
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
     * @param float $lat
     * @param int $lng
     * @return mixed
     * @throws Exception
     * get all data by hour and location
     */
    public function getOneHourData($hour=12,$lat = 46.4666 , $lng= -1.7395)
    {
        $myJsonFile = $this->getAPIData($lat,$lng);

        $jsonArray = json_decode($myJsonFile->content(),true);

        return $jsonArray["hours"][$hour];
    }

    /**
     * @param int $hour
     * @param float $lat
     * @param int $lng
     * @return float|int
     * @throws Exception
     * get Swellheight by hour and location
     */
    public function getSwellHeightFromHour($hour=12,$lat = 46.4666 , $lng= -1.7395)
    {
        $mySwellHeight = $this->getOneHourData($hour,$lat,$lng)["swellHeight"];
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
        if($nbValue==0)
        {
            foreach($mySwellHeight as $oneSource)
            {
                if($oneSource["source"] == "dwd")
                {
                    $moyValue += $oneSource;
                    $nbValue++;
                }
            }
            if($nbValue == 0)
            {
                $nbValue=1;
            }
        }
        return $moyValue/$nbValue;

    }

    /**
     * @param int $hour
     * @param float $lat
     * @param int $lng
     * @return float|int
     * @throws Exception
     * get WindDirection by hour and location
     */
    public function getWindDirectionFromHour($hour=12,$lat = 46.4666 , $lng= -1.7395)
    {
        $myWindDirection = $this->getOneHourData($hour,$lat,$lng)["windDirection"];
        $nbValueWind = 0;
        $moyValue = 0;
        foreach($myWindDirection as $oneSource)
        {
            if($oneSource["source"] != "dwd")
            {
                $moyValue += $oneSource["value"];
                $nbValueWind ++;
            }
        }
        if($nbValueWind==0)
        {
            foreach($myWindDirection as $oneSource)
            {
                if($oneSource["source"] == "dwd")
                {
                    $moyValue += $oneSource;
                    $nbValueWind++;
                }
            }
            if($nbValueWind == 0)
            {
                $nbValueWind=1;
            }
        }
        return $moyValue/$nbValueWind;
    }

    /**
     * @param int $hour
     * @param float $lat
     * @param int $lng
     * @return float|int
     * @throws Exception
     * Get WindSpeed from hour and location
     */
    public function getWindSpeedFromHour($hour=12,$lat = 46.4666 , $lng= -1.7395)
    {
        $myWindSpeed = $this->getOneHourData($hour,$lat,$lng)["windSpeed"];
        $nbValueWindS = 0;
        $moyValue = 0;
        foreach($myWindSpeed as $oneSource)
        {
            if($oneSource["source"] != "dwd")
            {
                $moyValue += $oneSource["value"];
                $nbValueWindS ++;
            }
        }
        if($nbValueWindS==0)
        {
            foreach($myWindSpeed as $oneSource)
            {
                if($oneSource["source"] == "dwd")
                {
                    $moyValue += $oneSource;
                    $nbValueWindS++;
                }
            }
            if($nbValueWindS == 0)
            {
                $nbValueWindS=1;
            }
        }
        return $moyValue/$nbValueWindS;
    }

    /**
     * @param $lat
     * @param $lng
     * Insert 11 first day, must be called once only
     */
    public function putFromAPIWeather($lat,$lng)
    {
        $days = [12,36,60,84,108,132,156,180,204,228,240]; // D-day(12h) D+10(0h max)
        foreach($days as $key => $hour)
        {
            try {
                DB::table('daydata')->insert(
                    ['daydata_windSpeed' => $this->getWindSpeedFromHour($hour,$lat,$lng), 'daydata_windDirection' => $this->getWindDirectionFromHour($hour,$lat,$lng), 'daydata_waveHeight' => $this->getSwellHeightFromHour($hour,$lat,$lng),
                    'daydata_areaId' => $this->findAreaId($lat,$lng),'createdAt' => date("d/m/Y"), 'updatedAt' => date("d/m/Y"), "daydata_date" => date("d/m/Y",strtotime(date("Y/m/d").' + '.$key.' DAY'))
                    ]


                );

            } catch (Exception $e) {
                var_dump("Errors on inserts");
            }

        }
    }

    /**
     * @param $lat
     * @param $lng
     * @return mixed
     * Find an Area's ID by his earth location
     */
    public function findAreaId($lat, $lng)
    {
        return DB::table('area')->select("area_id")->whereRaw("area_latitude = ".$lat." AND area_longitude = ".$lng)->get()[0]->area_id;
    }

    /**
     * Calling the DB insert for each Area
     */
    public function putAPIDataByLocation()
    {
        $areaData = json_decode(AreaController::getAll(),true);
        foreach ($areaData as $oneArea)
        {
            $this->putFromAPIWeather($oneArea["area_latitude"],$oneArea["area_longitude"]);
        }
    }

    public function dailyUpdateDatabase() //TODO Make the code more clean with Laravel DB update instead of raw SQL Query
    {
        $areaData = json_decode(AreaController::getAll(),true);
        foreach ($areaData as $oneArea)
        {
            $days = [12,36,60,84,108,132,156,180,204,228];
            foreach($days as $key => $hour)
            {
                try
                {
                //var_dump($oneArea["area_id"]." " . date("d/m/Y",strtotime(date("Y/m/d").' + '.$key.' DAY'))." ".$this->getWindSpeedFromHour($hour, $oneArea["area_latitude"], $oneArea["area_longitude"]). " ".
                    //$this->getWindDirectionFromHour($hour, $oneArea["area_latitude"], $oneArea["area_longitude"]) . ' ' . $this->getSwellHeightFromHour($hour, $oneArea["area_latitude"], $oneArea["area_longitude"]));
                    $dbString = "UPDATE daydata
                        SET
                        `daydata_windSpeed` = '" . $this->getWindSpeedFromHour($hour, $oneArea['area_latitude'], $oneArea['area_longitude']) .
                        "', `daydata_windDirection` = '". $this->getWindDirectionFromHour($hour, $oneArea['area_latitude'], $oneArea['area_longitude']) .
                        "', `daydata_waveHeight` = '". $this->getSwellHeightFromHour($hour, $oneArea['area_latitude'], $oneArea['area_longitude']) .
                        "', `updatedAt` = '".date("d/m/Y")."'
                        WHERE
                        `daydata_areaId` = '" . $oneArea['area_id'] .
                        "' AND
                        `daydata_date` = ('" . date('d/m/Y',strtotime(date('Y/m/d').' + '.$key.' DAY')) ."') OR " . date("d/m/Y");
                    DB::update($dbString); //
                    //var_dump($dbString);
                }
                catch (Exception $e)
                {
                    var_dump("Errors on update");
                }
            }
            //Insert of the last day
            try {
                DB::table('daydata')->insert(
                    ['daydata_windSpeed' => $this->getWindSpeedFromHour(240, $oneArea["area_latitude"], $oneArea["area_longitude"]), 'daydata_windDirection' => $this->getWindDirectionFromHour(240, $oneArea["area_latitude"], $oneArea["area_longitude"]), 'daydata_waveHeight' => $this->getSwellHeightFromHour(240, $oneArea["area_latitude"], $oneArea["area_longitude"]),
                        'daydata_areaId' => $oneArea["area_id"], 'createdAt' => date("d/m/Y"), 'updatedAt' => date("d/m/Y"), "daydata_date" => date("d/m/Y", strtotime(date("Y/m/d") . ' + 10 DAY'))
                    ]
                );
            } catch (Exception $e) {
            }

        }
    }

    public function getAllDataById($id=1)
    {
         $pastDays = DB::table('daydata')->select("*")->whereRaw("daydata_date > DATE_FORMAT((NOW() - INTERVAL 10 DAY),'%d%m%Y') AND `daydata_areaId`=".$id)->get();
         $nextDaysUnTraited = DB::table('daydata')->select("*")->whereRaw("daydata_date <= DATE_FORMAT((NOW() + INTERVAL 10 DAY),'%d%m%Y') AND daydata_areaId = ".$id)->get();

         //var_dump($pastDays);
         //var_dump($nextDaysUnTraited);
         for($i = 0; $i <= 9; $i++)
         {
             if(empty($pastDays[$i]))
             {
                 $pastDays[$i] = new stdClass();
                 $pastDays[$i]->daydata_id = "No Value";
                    $pastDays[$i]->daydata_windSpeed = "No Value";
                    $pastDays[$i]->daydata_windDirection = "No Value";
                    $pastDays[$i]->daydata_waveHeight =  "No Value";
                    $pastDays[$i]->daydata_temperature ="No Value";
                    $pastDays[$i]->daydata_noteOfTheDay ="No Value";
                    $pastDays[$i]->daydata_areaId ="No Value";
                    $pastDays[$i]->createdAt ="No Value";
                    $pastDays[$i]->updatedAt ="No Value";
                    $pastDays[$i]->daydata_date = "No Value";
             }
         }
        return [$pastDays,$nextDaysUnTraited];
    }





}
