<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<br /><br />
<table class="table table-bordered">
    <thead>   
      <tr>
        <th>Horse Name</th>
        <th>Distance Covered</th>
        <th>Horse Position</th>
        <th>Duration</th>
      </tr>
    </thead>
    <tbody>
          @foreach($raceDetails as $rDetails)
          <tr>
            <td>{{$rDetails->horse_name}}</td>
            <td>{{$rDetails->distance_covered}} meters</td>
            <td>{{$rDetails->position}}</td>
            <td>{{$rDetails->cur_time}}</td>
          </tr>
          @endforeach 
    </tbody>
</table>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
