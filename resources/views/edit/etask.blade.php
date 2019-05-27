@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css"/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  	<!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

    <!-- toastr notifications -->
    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


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
                <form action="{{action('TaskController@update', $id)}}" method="post" class="form-horizontal" role="form">
                        @csrf
                        @method('PATCH')
                <div class="modal-body">

                        <div class="form-group">
                            <label for="project_name" class="col-md-2 col-form-label text-md-right">{{ __('Project Title') }}</label>
                            <div class="col-md-8">                               
                                <input id="project_name" type="text" value="{{ $tasks->project_name }}"  class="form-control" name="project_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Task') }}</label>
                            <div class="col-md-8">                               
                                <input id="name" type="text" value="{{ $tasks->name }}"  class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-8">                               
                                <select name="status" id="task-status" onchange="this.className=this.options[this.selectedIndex].className" class="important form-control" required="">
                                    <option class="form-control">In Progress</option>
		                           	<option class="form-control">Waiting For Review</option>
                                    <option class="form-control">Stuck</option>
		                            <option class="form-control">Completed</option>
		                            		                            	
		                        </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="percentage" class="col-md-2 col-form-label text-md-right">{{ __('Progress') }}</label>
                            <div class="col-md-8">                               
                                <input id="percentage" type="text" value="{{ $tasks->percentage }}"  class="form-control" name="percentage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="priority" class="col-md-2 col-form-label text-md-right">{{ __('Priority') }}</label>
                            <div class="col-md-8">                               
                                <select name="priority" id="priority" class="important form-control" required="">
                                    <option class="form-control">High</option>
                                    <option class="form-control">Medium</option>
                                    <option class="form-control">Low</option>                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="col-md-2 col-form-label text-md-right">{{ __('Start Date') }}</label>
                            <div class="col-md-8">                               
                                <input id="start_date" type="text" value="{{ $tasks->start_date }}"  class="form-control" name="start_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="due_date" class="col-md-2 col-form-label text-md-right">{{ __('End Date') }}</label>
                            <div class="col-md-8">                               
                                <input id="due_date" type="text" value="{{ $tasks->due_date }}"  class="form-control" name="due_date">
                            </div>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-edit"></span> Yes </button>
                        <button type="submit" class="btn btn-warning" href="{{ url('/task') }}">
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