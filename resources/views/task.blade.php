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
					            <table class="table table-hover">
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
		                            			<option class="form-control"></option>
		                            			<option class="blue form-control">New</option>
		                            			<option class="green form-control">Done</option>
		                            			<option class="red form-control">Stuck</option>
		                            			<option class="yellow form-control">Working on it</option>
		                            			
		                            		</select>
		                            	</td>
		                            	<td><input type="text" name="due_date" id="task-date" class="date form-control" autocomplete="off" required=""></td>
		                            	<!-- Add Task Button -->
		                            	<td>
		                            		<button type="submit" value="add" name="submitbutton" class="btn btn-outline-success">
					                        <i class="fa fa-plus"></i> 
					                    	</button>
					                	</td>
		                            </tbody>
					            </table>

					            <table class="table table-hover">
		                            <!-- <thead>
		                                <tr>
		                                <th scope="col">Name</th>
		                                <th scope="col">Status</th>
		                                
		                                </tr>
		                            </thead> -->
		                            
		                        </table>

					        </form>   
				    	</div>
				</div>
		    </div>
    	</div>
    </div>



    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-8">
    			<div class="card">

                		<div class="card-body">
                			
						            {{csrf_field()}}
						        
						        <table class="table table-hover">
		                            <tbody>
		                            	@if( ! $tasks->isEmpty())
                                		@foreach($tasks as $task)
                                		<tr>
                                			<td contenteditable="true">{{$task->name}}</td>
                                			<td contenteditable="true">{{$task->status}}</td>
                                			<td contenteditable="true">{{$task->due_date}}</td>
                                			<td>
                                				<a href="{{ route('task.delete',['id' => $task->id]) }}">
                                					<button type="button" value="delete" name="submitbutton" class="btn btn-outline-danger">
							                        	<i class="fa fa-trash"></i> 
							                    	</button>
                                				</a>
                                			</td>
                                		</tr>
                                		@endforeach
                                		@endif
		                            </tbody>
		                        </table>
			                
			            </div>
			        </div>
			    </div>
			</div>
		</div>


<!-- 
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-8">
    			<div class="card">
    				<div class="card-header"> Task Lists</div>
                		<div class="card-body">
						        <table class="table table-hover">
		                            <thead>
		                                <tr>
		                                <th scope="col">Task</th>
		                                <th scope="col">Status</th>
		                                
		                                </tr>
		                            </thead>
		                            <tbody>
		                            	<td><input type="text" name="name[]" id="task-name" class="form-control"></td>
		                            	<td><input type="text" name="status[]" id="task-status" class="form-control"></td>
		                            	<td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>
		                            </tbody>
		                        </table>
		                        <div class="form-group">
							        <div class="col-sm-offset-3 col-sm-6">
							            <button type="submit" class="btn btn-outline-success addTask">
							                <i class="fa fa-plus"></i> Add Task
							            </button>
							        </div>
							    </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div> -->

		

		<script type="text/javascript">

			// $('.addTask').on('click',function(){
			// 	addTask();
			// });
			// function addTask(){
			// 	var tr = '<tr>'+
			// 					'<td><input type="text" name="name[]" id="task-name" class="form-control"></td>'+
		 //                        '<td><input type="text" name="status[]" id="task-status" class="form-control"></td>'+
		 //                        '<td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>'+
		 //                  '</tr>';
		 //                  $('tbody').append(tr);      
			// };

			// $('tbody').on('click', '.remove', function() {
			// 	$(this).parent().parent().remove();
				
			// });

			$('.date').datepicker({
		        autoclose: true,
		        dateFormat: "yy-mm-dd"
		    });

		</script>


</body>
</html>

@endsection