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
    <div class="row" style="padding-left: 160px; padding-bottom: 10px">
      <form method="POST" action="#" style="text-align: left;">
        @csrf
      <select class=”form-control” name='year' style="width:150px;" id='type'>
        <option value=#>Please choose</option>
        <option value=2019>2019</option>
        <option value=2018>2018</option>
        <option value=2017>2017</option>
        <option value=2016>2016</option>
        <option value=2015>2015</option>
      </select>
      <button type="submit" class="btn btn-primary">
        {{ __('Submit') }}
      </button>          
      </form>
    </div>
  </div>

  <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-9">
            <div class="card" style="width:120%;">
              <div class="card-header" style="background-color: white">
                Line Chart
              </div>
              {!! $line_chart->html() !!}
            </div>
          </div>
        </div>
      </div>

    {!! Charts::scripts() !!}

    {!! $line_chart->script() !!}
               

    

</body>
</html>


@endsection