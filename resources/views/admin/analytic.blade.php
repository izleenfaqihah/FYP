@extends('layouts.app2')

@section('content')

<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8">
    
</head>
<style>
    .list-group {
  height: 100%;
  position: absolute;
  top: 55px;
  width: 225px;
  overflow: hidden;
}

</style>

<body>

<div class="list-group">
   
    <a href="{{ route('admin.dashboard') }}" class="list-group-item"><i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a>  
    <a href="{{ route('admin.register') }}" class="list-group-item"><i class="glyphicon glyphicon-list"></i> <span>Register Employee</span></a>
    <a href="{{ route('admin.employee') }}" class="list-group-item"><i class="glyphicon glyphicon-user"></i> <span>Employee List</span></a>
</div>

    <div class="container">
    <div class="row" style="padding-left: 160px; padding-bottom: 10px">
      <form method="POST" action="{{ route('analytic.submit') }}" style="text-align: left;">
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
            <div class="card" style="width:130%;">
              <div class="card-header" style="background-color: white">
                Bar Chart
              </div>
              {!! $chart->html() !!}
            </div>
          </div>
        </div>
      </div>

    {!! Charts::scripts() !!}

    {!! $chart->script() !!}

</body>
</html>


@endsection
