@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

          @include('layouts.notification')
          @if ($errors->any())
              <div class="notification alert-box error">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif


            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Manage Race</strong>
                    <div class="pull-right">
                      <a <?php echo $upCommingRaces->count() > 2 ? "class='btn btn-primary disabled'" : "class='btn btn-primary'"; ?> href="{{url('createRace')}}">
                        Create Race
                      </a>

                      <a href="{{url('start')}}" class="btn btn-success">
                        Progress
                      </a>

                    </div> 
                    <br style="clear:both;" />   
                </div>

                <div class="panel-body">
                  <div class="pull-left">
                  <strong>List of Active Race</strong>
                  </div>
                
                  <br  style="clear:both;" /> <br />

                  @if(isset($raceDetailsArr))
                    @foreach($raceDetailsArr as $race)
                    <table class="table table-bordered" style="width:45%;float:left; margin-right:5%;">

                        <thead>   
                          <tr>
                            <td colspan="4">
                              <strong>
                                {{'Race No. ' .  $race->race_id}}
                              </strong>
                            </td>
                          </tr>
                          <tr>
                            <th>Horse Name</th>
                            <th>Distance Covered</th>
                            <th>Horse Position</th>
                            <th>Current time</th>
                          </tr>
                        </thead>
                        <tbody>
                              @foreach($race->raceDetails as $rDetails)
                              <tr>
                                <td>{{$rDetails->horse_name}}</td>
                                <td>{{$rDetails->distance_covered}}</td>
                                <td>{{$rDetails->position}}</td>
                                <td>{{$rDetails->cur_time}}</td>
                              </tr>
                              @endforeach 
                        </tbody>
                    </table>
                    @endforeach
                    @endif
                </div>
            </div>

             <div class="panel panel-default">
                  <div class="panel-heading">
                      <strong>Latest Race Results</strong>
                  </div>

                  <div class="panel-body">
                      <table class="table table-bordered">
                          <thead>   
                            <tr>
                              <th>Race Number</th>
                              <th>Race Status</th>
                              <th>Distance</th>
                              <th>Date Created</th>
                              <th>Date Updated</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                              <tbody>
                                @foreach($raceResults as $frace)
                                <tr>
                                  <td>
                                    <a href="{{url('viewRace')}}"
                                      onclick="window.open('{{url('viewRaceDetails') . "/" . $frace->race_id }}', 
                                         'newwindow', 
                                         'width=500,height=500,top=200,left=300,right=300'); 
                                          return false;"    
                                    >
                                    {{$frace->race_id}}
                                    </a>
                                  </td>
                                  <td>
                                   @if($frace->race_status==0)
                                      Not Yet Started     
                                  @elseif ($frace->race_status==1)
                                      Started 
                                  @elseif ($frace->race_status==2)   
                                      Completed  
                                  @endif
                                  </td>
                                  <td>{{$frace->race_distance . " meters" }}</td>
                                  <td>{{$frace->created_at}}</td>
                                  <td>{{$frace->updated_at}}</td>
                                  <td>
                                    <a class="btn btn-warning btn-xs" href="{{url('viewRace')}}"
                                      onclick="window.open('{{url('viewRaceDetails') . "/" . $frace->race_id }}', 
                                         'newwindow', 
                                         'width=500,height=500,top=200,left=300,right=300'); 
                                          return false;"    
                                    >
                                    View Results
                                    </a>
                                  </td>
                                </tr>
                                @endforeach 
                            </tbody>
                       </table> 
                  </div>
             </div>  

             <div class="panel panel-default">
                  <div class="panel-heading">
                      <strong>Horse with Best Time</strong>
                  </div>


                  <div class="panel-body">
                      <table class="table table-bordered">
                          <thead>   
                            <tr>
                              <th>Race Number</th>
                              <th>Horse Name</th>
                              <th>Speed</th>
                              <th>Strength</th>
                              <th>Endurance</th>
                              <th>Distance Covered</th>
                              <th>Duration</th>
                              <th>Race Date</th>
                            </tr>
                          </thead>
                          <tbody>

  
                              @if(count($horseWithBestTime) > 0)
                                  <tr>
                                      <td>{{$horseWithBestTime{0}->race_id}}</td>
                                      <td>{{$horseWithBestTime{0}->horse_name}}</td>
                                      <td>{{$horseWithBestTime{0}->horse_speed}}</td>
                                      <td>{{$horseWithBestTime{0}->horse_strength}}</td>
                                      <td>{{$horseWithBestTime{0}->horse_endurance}}</td>
                                      <td>{{$horseWithBestTime{0}->distance_covered}}</td>
                                      <td>{{$horseWithBestTime{0}->cur_time}}</td>
                                      <td>{{$horseWithBestTime{0}->raceDate}}</td>
                                  </tr>  
                              @endif

                          </tbody>        
                    </table>        
                 </div>     
            </div>
            

        </div>
    </div>
</div>
@endsection
