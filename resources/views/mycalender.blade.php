@extends('layouts.app')

@section('content')

<!doctype html>

<html lang="en">

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
          })
      })
    </script>

</head>

<style type="text/css">
    .card {
        margin-right: 40px;
    }
</style>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card col-md-9">
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
            <a class="weatherwidget-io" href="https://forecast7.com/en/2d92101d78/bangi/" data-label_1="BANGI" data-label_2="WEATHER" data-theme="weather_one" >BANGI WEATHER</a> <br><br><br>

            
        </div>
    </div>
</div>

            <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>

</body>

</html>


@endsection