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
	.green {
		background-color: #39FF14;
	}
	.red {
		background-color: red;
	}
	.yellow {
		background-color: yellow;
	}
	.blue {
		background-color: #8cbed6;
	}
</style>
<body>

    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-8">
    			<div class="card">
                	<div class="card-header">New Task</div>
                		<div class="card-body">
					        <!-- Display Validation Errors -->
					        

					        <!-- New Task Form -->
					        <form action="{{ route('task.submit') }}" method="POST" class="form-horizontal">
					            {{ csrf_field() }}

					            <!-- Task Name -->
					            <table class="table">
		                            <thead>
		                                <tr>
		                                <th scope="col">Task</th>
		                                <th scope="col">Status</th>
		                                <th scope="col">Due Date</th>
		                                <th scope="col"></th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                            	<td><input type="text" name="name" id="task-name" class="form-control" required=""></td>
		                            	<td>
		                            		<select name="status" id="task-status" onchange="this.className=this.options[this.selectedIndex].className"
    											class="important form-control" required="">
		                            			<option class="blue form-control">New</option>
		                            			<option class="green form-control">Done</option>
		                            			<option class="red form-control">Stuck</option>
		                            			<option class="yellow form-control">Working on it</option>
		                            			
		                            		</select>
		                            	</td>
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

@foreach($tasks as $task)

    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-8">
    			<div class="card">

                		<div class="card-body">
                			
						            {{csrf_field()}}
						        
						        <table class="table table-hover">
		                            <tbody>
		                            	<thead>
                                        <tr>
                                        <th scope="col">Task</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Percentage %</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                		
                                		<tr>
                                			<td>{{$task->name}}</td>
                                			<td>{{$task->status}}</td>
                                            <td>{{$task->percentage}}</td>
                                			<td>{{$task->due_date}}</td>
                                			<td>
                                				<button class="btn btn-info" data-toggle="modal" data-target="#edit-modal">
                                        			<span class="glyphicon glyphicon-edit"></span> 
                                        		</button>
                                				
                                				<a class="btn btn-danger" onclick="return myFunction();" href="{{ route('task.delete',['task_id' => $task->task_id]) }}">
                                					<i class="fa fa-trash"></i>
                                				</a>
                                			</td>
                                		</tr>
                                		
                                		
		                            </tbody>
		                        </table>
			                
			            </div>
			        </div>
			    </div>
			</div>
		</div>

		<!-- Edit Modal -->
  <div class="modal fade" id="edit-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="margin: 10">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                
                </div>
                <form action="{{ route('task.update',['task_id' => $task->task_id]) }}" method="post" class="form-horizontal" role="form">
                        @csrf
                        @method('PATCH')
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Rename') }}</label>
                            <div class="col-md-8">                               
                                <input id="name" type="text" value="{{ @$task['name'] }}"  class="form-control" name="name" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-md-3 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-8">                               
                                <select name="status" id="task-status" onchange="this.className=this.options[this.selectedIndex].className" class="important form-control" required="">
                                    <option class="yellow form-control">Working on it</option>
		                           	<option class="blue form-control">Waiting For Review</option>
                                    <option class="red form-control">Stuck</option>
		                            <option class="green form-control">Done</option>
		                            		                            	
		                        </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="percentage" class="col-md-3 col-form-label text-md-right">{{ __('Percentage') }}</label>
                            <div class="col-md-8">                               
                                <input id="percentage" type="text" value="{{ @$task['percentage'] }}"  class="form-control" name="percentage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="due_date" class="col-md-3 col-form-label text-md-right">{{ __('Due Date') }}</label>
                            <div class="col-md-8">                               
                                <input id="due_date" type="text" value="{{ @$task['due_date'] }}"  class="form-control" name="due_date" readonly="">
                            </div>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-edit"></span> Yes </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Cancel
                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
  </div>
@endforeach
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