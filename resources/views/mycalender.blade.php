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
    /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
</style>

<body>
      <div class="container">     
        <div class="row">
          <div class="col-md-6">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-9">
                  <div class="card border-warning" style="width: 80%">
                    <div class="card-header border-warning" style="background-color: white">    
                      Calendar
                    </div>
                  <div class="card-body">
                    {!! $calendar->calendar() !!}

                    {!! $calendar->script() !!}
                  </div>
            </div>            
          </div>
        </div>
      </div>
          </div>
          <div class="col-md-6">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="card border-info" style="width: 50%">
                    <div class="card-header border-info" style="background-color: white">    
                      Weather
                    </div>
                        <div class="card-body">
                          <a class="weatherwidget-io" href="https://forecast7.com/en/2d92101d78/bangi/" data-label_1="BANGI" data-label_2="WEATHER" data-theme="weather_one" >BANGI WEATHER</a>
            
                        </div>
                  </div>            
                </div>
              </div>
            </div>   
          </div>
        </div>
      </div>
<br><br>
      <div class="container">     
        <div class="row">
          <div class="col-md-6">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-9">
                  <div class="card border-danger" style="width: 120%">
                    <div class="card-header border-danger" style="background-color: white">    
                      Carousel Slide
                    </div>
                    <div class="card-body">
                      <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                          <li data-target="#demo" data-slide-to="0" class="active"></li>
                          <li data-target="#demo" data-slide-to="1"></li>
                          <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="images/img_2.jpg" alt="Los Angeles" width="90" height="90">
                          </div>
                          <div class="carousel-item">
                            <img src="images/img_3.jpg" alt="Chicago" width="90" height="90">
                          </div>
                          <div class="carousel-item">
                            <img src="images/img_4.jpg" alt="New York" width="90" height="90">
                          </div>
                          <div class="carousel-item">
                            <img src="images/img_5.jpg" alt="New York" width="90" height="90">
                          </div>
                        </div>
                        
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                          <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

            <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>

</body>

</html>


@endsection