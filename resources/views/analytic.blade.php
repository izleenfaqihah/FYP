@extends('layouts.app')

@section('content')

{{ csrf_field() }}

<!DOCTYPE html>
<html>
<head>
	 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body>

    <div class="container">
    <div class="row" style="padding-left: 130px; padding-bottom: 10px">
      <form method="POST" action="{{ route('report.submit') }}" style="text-align: left;">
        @csrf
      <select class=”form-control” name='year' style="width:150px;" id='type'>
        <option value=#>Please choose</option>
        <option value=2019>2019</option>
        <option value=2018>2018</option>
        <option value=2017>2017</option>
        <option value=2016>2016</option>
        <option value=2015>2015</option>
      </select>
      <button type="submit" class="btn btn-outline-primary">
        {{ __('Submit') }}
      </button>          
      </form>
    </div>
  </div>

  <div class="container">     
        <div class="row">
          <div class="col-md-6">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-10">
                  <div class="card border-warning" style="width: 60%">
                    <div class="card-header border-warning" style="background-color: white">    
                      Bar Chart
                    </div>
                  <div class="card-body">
                    {!! $chart->html() !!}
                  </div>
            </div>            
          </div>
        </div>
      </div>
          </div>
          <div class="col-md-6">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-10">
                  <div class="card border-info" style="width: 60%">
                    <div class="card-header border-info" style="background-color: white">    
                      Line Chart
                    </div>
                        <div class="card-body">
                          {!! $line_chart->html() !!}
                        </div>
                  </div>            
                </div>
              </div>
            </div>   
          </div>
        </div>
      </div>
<br>
        
        <div class="container">     
        <div class="row">
          <div class="col-md-6">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-10">
                  <div class="card border-danger" style="width: 60%">
                    <div class="card-header border-danger" style="background-color: white">    
                      Donut Chart
                    </div>
                  <div class="card-body">
                    {!! $donut_chart->html() !!}
                  </div>
            </div>            
          </div>
        </div>
      </div>
          </div>
          <div class="col-md-6">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-10">
                  <div class="card border-success" style="width: 60%">
                    <div class="card-header border-success" style="background-color: white">    
                      Area Chart
                    </div>
                        <div class="card-body">
                          {!! $area_chart->html() !!}
                        </div>
                  </div>            
                </div>
              </div>
            </div>   
          </div>
        </div>
      </div>

</body>
</html>


    {!! Charts::scripts() !!}

    {!! $chart->script() !!}
    {!! $area_chart->script() !!}
    {!! $donut_chart->script() !!}
    {!! $line_chart->script() !!}

@endsection