@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h2>List of Horses</h2>
                </div>

                <div class="panel-body">
                     <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Horse Name</th>
                            <th>Speed</th>
                            <th>Strength</th>
                            <th>Endurance</th>
                            <th>Jockey Name</th>
                            <th>Status</th>
                            <th>Date Created</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($horses as $horse)
                              <tr>
                                <td>{{$horse->horse_name}}</td>
                                <td>{{$horse->horse_speed}}</td>
                                <td>{{$horse->horse_strength}}</td>
                                <td>{{$horse->horse_endurance}}</td>
                                <td>{{$horse->jockey_name}}</td>
                                <td>{{$horse->is_racing == 0 ? "Available" : "In-race"}}</td>
                                <td>{{$horse->created_at}}</td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($horses) > 0)
                      <div class="pull-right">
                          {{ $horses->links() }}
                      </div>  
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
