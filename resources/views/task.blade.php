@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
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
					            <div class="form-group">

					                <div class="col-sm-6">
					                    <input type="text" name="name" id="task-name" class="form-control">
					                </div>
					            </div>

					            <!-- Add Task Button -->
					            <div class="form-group">
					                <div class="col-sm-offset-3 col-sm-6">
					                    <button type="submit" class="btn btn-outline-success">
					                        <i class="fa fa-plus"></i> Add Task
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



    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-8">
    			<div class="card">
    				<div class="card-header">Current Task</div>
                		<div class="card-body">
                			<form method="post" action="{{ route('task') }}">
						            {{csrf_field()}}
						        
						        <table class="table table-hover">
		                            <thead>
		                                <tr>
		                                <th scope="col">Name</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                            	@if( ! $tasks->isEmpty())
                                		@foreach($tasks as $task)
                                		<tr>
                                			<td>{{$task->name}}</td>
                                		</tr>
                                		@endforeach
                                		@endif
		                            </tbody>
		                        </table>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>
		</div>



</body>
</html>

@endsection