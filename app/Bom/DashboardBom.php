<?php


namespace App\Bom;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use stdClass;

use App\Models\Horse;
use App\Models\Race;
use App\Models\RaceDetails;

class DashboardBom
{

    private $baseSpeed = 5;
    private $horseEndurance = 100;
    private $horseSpeedWithJockey = 5;
    private $distance = 500;
    private $strValForComputation = 8;
    private $totalNumberOfHorsePerRace = 8;
    private $totalDistanceCoveredOfAllHorses = 8 * 500;


    /**
    * @param
    * 
    */

    public function getRaceResults($status,$limit=null) {
        if($limit!=null) {
          $results =  Race::whereIn("race_status",$status)
                            ->orderBy('created_at', 'DESC')
                            ->take(5)
                            ->get();
        } else {
          $results = Race::whereIn("race_status",$status)->get();
        }
        return $results;
    }

    public function getHorseWithBestTime() {
            return DB::select("SELECT
                                      h.horse_name, 
                                      rd.race_id,
                                      h.horse_speed,
                                      h.horse_endurance,
                                      h.horse_strength,
                                      rd.distance_covered, 
                                      rd.cur_time,
                                      rd.horse_id, 
                                      rd.created_at as raceDate,
                                      @position := @position + 1 AS position
                                      FROM 
                                      race_details rd,
                                      (SELECT @position := 0) r,
                                      horses h
                                      where
                                      rd.horse_id=h.horse_id
                                      and h.is_racing=0
                                      ORDER BY cur_time ASC LIMIT 1");

    }

   
    public function buildUpcomingRaceData($upCommingRaces) {
        $raceDetailsArr = array();
        foreach($upCommingRaces as $race) {
            $raceDetails = DB::select("SELECT 
                                      rd.horse_id, rd.distance_covered, rd.cur_time,
                                      (select horse_name  from horses where rd.horse_id=horse_id) as horse_name, 
                                      @position := @position + 1 AS position 
                                      FROM race_details rd,
                                      (SELECT @position := 0) r 
                                      WHERE rd.race_id=".$race->race_id."
                                      ORDER BY distance_covered DESC");

            $raceData = new stdClass();
            $raceData->race_id = $race->race_id;
            $raceData->race_status = $race->race_status;
            $raceData->race_distance = $race->race_distance;
            $raceData->created_at = $race->created_at;
            $raceData->raceDetails = $raceDetails ;
            $raceDetailsArr[] = $raceData;
        }
        $raceDetailsArr = (object) $raceDetailsArr;
        return $raceDetailsArr;
    }

    public function createNewRace() {
        $success = DB::transaction(function()  {
              $race = new Race;
              $race->race_distance = 1500;
              $race->created_at = Carbon::now();
              $race->save();  

              $raceDetails = DB::insert("insert into race_details(race_id,horse_id,created_at) 
                        select 
                        ".$race->race_id.",horse_id,'".Carbon::now()."'
                        from 
                        horses 
                        where 
                        is_racing=0
                        order by rand()
                        limit ".$this->totalNumberOfHorsePerRace." 
                        ");
              $updateHorses = DB::update("update 
                          horses as h
                          set 
                          h.is_racing =1
                          where
                          h.horse_id IN  
                          (select horse_id from race_details where race_id=".$race->race_id.")
                          ");
              return $updateHorses;   
        }); 
        return $success;  
    }

    public function getAllAvailableHorses() {
        return DB::table('race_details as rd')
                 ->select('rd.race_details_id',
                        'rd.race_id',
                        'rd.horse_id',
                        'rd.distance_covered',
                        'rd.horse_position',
                        'rd.cur_time',
                        'h.horse_name',
                        'h.horse_speed',
                        'h.horse_strength',
                        'h.horse_endurance',
                        'h.jockey_name')
                 ->join('horses as h', 'h.horse_id', '=', 'rd.horse_id')
                 ->join('races as r', 'r.race_id', '=', 'rd.race_id')
                 ->whereIn('r.race_status',array(0,1))
                 ->get();
    }


    public function processRaceData($horses) {
       $distanceCovered = 0;
       $totalDistanceCovered = 0;
       $addedTimePerProcess = 10;



       foreach($horses as $horse) {

          $totalDistanceCovered = RaceDetails::where('race_id',$horse->race_id)->sum('distance_covered');
          /*
           check and update race status if all horse completed the race.     
          */
          if($totalDistanceCovered >= $this->totalDistanceCoveredOfAllHorses) {
              Race::where('race_id',$horse->race_id)->update(['race_status'=>2]);
          }

          $enduranceComputation = $horse->horse_endurance * 100;
          $horseSpeed = $horse->horse_speed + $this->baseSpeed;


          if($horse->distance_covered <= $enduranceComputation) {
                $horseSpeed = $this->computeHorseInitialSpeed($horse->horse_speed);
          } else {
                $horseSpeed = $this->computeHorseFinalSpeed($horse->horse_strength,$horse->horse_speed);
          }

         

         
          /*
           @start process
           updating of horse data like distance covered and horse status 
           if they already finished the race     
          */  
          $distanceCovered = ($horseSpeed * $addedTimePerProcess) + $horse->distance_covered;
          $currentTime = date("H:i:s", (strtotime(date($horse->cur_time)) + $addedTimePerProcess));

          if($horse->distance_covered < $this->distance) {

              if($distanceCovered >= $this->distance) {
                 $totalDistanceCovered[$horse->race_id] =+$distanceCovered; 
                 $distanceCovered = $this->distance;  
                 Horse::where('horse_id',$horse->horse_id)->update(['is_racing'=>0]);   
              }
              RaceDetails::where('race_details_id',$horse->race_details_id)
                                   ->update(['distance_covered' => $distanceCovered,
                                              'cur_time' => $currentTime,
                                              'updated_at' =>  Carbon::now()
                                              ]);
          }

          /*
           end  process   
          */

       } 

    }

    public function computeHorseInitialSpeed($horseSpeed) {
        return $horseSpeed + $this->baseSpeed;
    }

    public function computeHorseFinalSpeed($horseStrength,$horseSpeed) {
         $horseSpeed = ($horseStrength * $this->strValForComputation)/100;
         $horseSpeed = $this->horseSpeedWithJockey - ($this->horseSpeedWithJockey * $horseSpeed);
         $horseSpeed = ($horseSpeed + $this->baseSpeed) - $horseSpeed;
         return $horseSpeed;
    }

    
}