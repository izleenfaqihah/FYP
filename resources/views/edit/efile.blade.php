@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">

    <!-- CSFR token for ajax call -->
    <meta name="_token" content="{{ csrf_token() }}"/>

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
    
      @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        <div>
        @endif

                <form action="{{action('FileController@update', $id)}}" method="post" class="form-horizontal" role="form">
                        @csrf
                        @method('PATCH')
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="document" class="col-md-2 col-form-label text-md-right">{{ __('Rename') }}</label>
                            <div class="col-md-8">                               
                                <input id="document" type="text" value="{{ @$file['document'] }}"  class="form-control" name="document">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-8">                               
                                <select name="category" id="category" class="important form-control" required="">
                                    <option class="form-control">Residential</option>
                                    <option class="form-control">Institutional</option> 
                                    <option class="form-control">Assembly</option>
                                    <option class="form-control">Industrial</option> 
                                    <option class="form-control">Business</option>
                                    <option class="form-control">Mercantile</option>                                            
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="created_at" class="col-md-2 col-form-label text-md-right">{{ __('Date') }}</label>
                            <div class="col-md-8">                               
                                <input id="created_at" type="text" value="{{ @$file['created_at'] }}"  class="form-control" name="created_at">
                            </div>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-edit"></span> Yes </button>
                        <button type="submit" class="btn btn-warning" href="{{ url('/project') }}">
                            <span class='glyphicon glyphicon-remove'></span> Cancel
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>


    
</body>
</html>

@endsection