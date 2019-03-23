@extends('layouts.app')

@section('content')

<!doctype html>

<html lang="en">

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <script>
   
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
      editable:true,
      header:{
       left:'prev,next today',
       center:'title',
       right:'month,agendaWeek,agendaDay'
      },
      events: 'load.php',
      selectable:true,
      selectHelper:true,
      displayEventTime: false,
      select: function(start, end, allDay)
      {
       var title = prompt("Enter Task");
        }
    </script>

</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            {!! $calendar->calendar() !!}

            {!! $calendar->script() !!}
                
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>


@endsection