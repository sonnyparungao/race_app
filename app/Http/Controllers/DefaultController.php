<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Bom\DashboardBom;

use App\Models\Horse;
use App\Models\Race;
use App\Models\RaceDetails;

use stdClass;


class DefaultController extends Controller
{
    private $baseSpeed = 5;
    private $horseEndurance = 100;
    private $horseSpeedWithJockey = 5;
    private $distance = 1000;
    private $strValForComputation = 8;


    public function index()
    {
        $dashboardBom = new DashboardBom();
        $upCommingRaces =  $dashboardBom->getRaceResults(array(0,1));
        $raceResults =  $dashboardBom->getRaceResults(array(2),5);
        $horseWithBestTime =  $dashboardBom->getHorseWithBestTime();
        $raceDetailsArr =  $dashboardBom->buildUpcomingRaceData($upCommingRaces);

        return view("home",compact('raceDetailsArr','upCommingRaces','raceResults','horseWithBestTime'));
    }

     public function viewRaceDetails($id) {
      $raceDetails = DB::select("SELECT 
                                      (select horse_name  from horses where rd.horse_id=horse_id) as horse_name, 
                                      rd.distance_covered, 
                                      rd.cur_time,
                                      rd.horse_id, 
                                      @position := @position + 1 AS position 
                                      FROM race_details rd,
                                      (SELECT @position := 0) r 
                                      WHERE rd.race_id=".$id."
                                      ORDER BY cur_time ASC LIMIT 3"); 
      return view("dashboard.race_details",compact('raceDetails'));   
     }

}