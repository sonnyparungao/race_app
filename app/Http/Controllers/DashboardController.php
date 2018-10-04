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



class DashboardController extends Controller
{

    private $baseSpeed = 5;
    private $horseEndurance = 100;
    private $horseSpeedWithJockey = 5;
    private $distance = 500;
    private $strValForComputation = 8;
    private $totalNumberOfHorsePerRace = 8;
    private $totalDistanceCoveredOfAllHorses = 8 * 500;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

  

    public function index()
    {
        $dashboardBom = new DashboardBom();

        $upCommingRaces =  $dashboardBom->getRaceResults(array(0,1));
        $raceResults =  $dashboardBom->getRaceResults(array(2),5);
        $horseWithBestTime =  $dashboardBom->getHorseWithBestTime();
        $raceDetailsArr =  $dashboardBom->buildUpcomingRaceData($upCommingRaces);

        return view("dashboard.index",compact('raceDetailsArr','upCommingRaces','raceResults','horseWithBestTime'));
    }


    public function processCreateRace() {
        $dashboardBom = new DashboardBom();
        $success =   $dashboardBom->createNewRace();

        if($success) {
          return redirect()->back()->with('success', 'You have successfully create new race.');
        }   else {
          return redirect()->back()->with('error', 'Please try again.');
        }       
    }
  

    public function processRace(Request  $request) {
       
       $dashboardBom = new DashboardBom();
       $horses = $dashboardBom->getAllAvailableHorses();

        $dashboardBom->processRaceData($horses);


       return redirect("/dashboard");

    }


 



}
