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

<style type="text/css">
    .container {
        margin-left: 18%;
    }
    .modal-content {
        width: 860px;
        margin-right: 27%;
    }
    .modal-dialog {
        margin-left: 18%;
    }
</style>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form action="{{route('task.search')}}" method="get">
                {{csrf_field()}}
                <input type="text" placeholder="Search" name="search">
                <button class="btn fa fa-search my-2 my-sm-0" style="font-size:24px;color:grey" type="submit"></button>
            </form>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn" style="font-size:18px;color:grey" data-toggle="modal" data-target="#myTask"><i class="glyphicon glyphicon-plus"></i> New Task</button>
        </div>   
    </div>

<br><br>

    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card">
                    <div class="card-header" align="center" style="background-color: lightblue">All The Tasks</div>
                		<div class="card-body">
                			
						            {{csrf_field()}}
						        
						        <table class="table table-hover">
		                            <tbody>
		                            	<thead>
                                        <tr>
                                        <th scope="col">Project Title</th>
                                        <th scope="col">Task</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Progress %</th>
                                        <th scope="col">Priority</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                		@foreach($tasks as $task)
                                		<tr>
                                            <td>{{$task->project_name}}</td>
                                			<td>{{$task->name}}</td>
                                			
                                            <td>
                                            @if ($task->status === 'Completed')
                                                <span class="btn btn-success">Completed</span>
                                            @elseif ($task->status === 'Stuck')
                                                <span class="btn btn-danger">Stuck</span>
                                            @elseif ($task->status === 'Waiting For Review')
                                                <span class="btn btn-info">Waiting For Review</span>
                                            @elseif ($task->status === 'New')
                                                <span class="btn btn-primary">New</span>
                                            @else
                                                <span class="btn btn-warning">In Progress</span>
                                            @endif
                                            </td>
                                            <td>{{$task->percentage}}</td>
                                            <td>{{$task->priority}}</td>
                                            <td>{{$task->start_date}}</td>
                                			<td>{{$task->due_date}}</td>
                                			<td>
                                				
                                                <a href="{{ route('task.edit',['task_id' => $task->task_id]) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                				
                                				<a class="btn btn-danger" onclick="return myFunction();" href="{{ route('task.delete',['task_id' => $task->task_id]) }}">
                                					<i class="fa fa-trash"></i>
                                				</a>
                                			</td>
                                		</tr>
                                		@endforeach
		                            </tbody>
		                        </table>
			            </div>
			        </div>
			    </div>
			</div>
		</div>

        <!-- Task Modal -->
  <div class="modal fade" id="myTask" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="margin: 10">New Task</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                    
                </div>
                <div class="modal-body">
                    <form action="{{ route('task.submit') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Project Title</th>    
                                        <th scope="col">Task</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" value="{{ Auth::user()->user_id }}" name="user_id">
                                        <td><input type="text" name="project_name" id="project_name-name" class="form-control" required=""></td>
                                        <td><input type="text" name="name" id="task-name" class="form-control" required=""></td>
                                        <td>
                                            <select name="status" id="task-status" class="important form-control" required="">
                                                <option class="form-control">New</option>
                                                <option class="form-control">In Progress</option>
                                                <option class="form-control">Stuck</option>
                                                <option class="form-control">Completed</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="start_date" id="start-date" class="date form-control" autocomplete="off" required=""></td>
                                        <td><input type="text" name="due_date" id="task-date" class="date form-control" autocomplete="off" required=""></td>
                                        <!-- Add Task Button -->
                                        <td>
                                            <button type="submit" value="add" name="submitbutton" class="btn btn-success">
                                            <i class="fa fa-plus"></i> 
                                            </button>
                                        </td>
                                    </tbody>
                                </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

		<script type="text/javascript">
			$('.date').datepicker({
		        autoclose: true,
		        dateFormat: "yy-mm-dd"
		    });

		    function myFunction() {
			      if(!confirm("Are You Sure to delete this"))
			      event.preventDefault();
			  }
		</script>

		<!-- jQuery -->
    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</body>
</html>

@endsection