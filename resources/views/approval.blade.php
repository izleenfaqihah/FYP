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
        margin-left: 16%;
    }
</style>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <input type="text"  placeholder="Search" name="search">
            <button class="btn fa fa-search my-2 my-sm-0" style="font-size:24px;color:grey" type="submit"></button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn" style="font-size:18px;color:grey" data-toggle="modal" data-target="#myApproval"><i class="glyphicon glyphicon-plus"></i> New Approval</button>
        </div>   
    </div>
    <br>
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-10">
    			<div class="card">
                    <div class="card-header" align="center">Approvals</div>
                		<div class="card-body">
                			
						            {{csrf_field()}}
						        
						        <table class="table table-hover">
		                            <tbody>
		                            	<thead>
                                        <tr>
                                        <th scope="col">Proposal Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                		@foreach($approvals as $approval)
                                		<tr>
                                            <td>{{$approval->proposal_name}}</td>
                                            <td>
                                            @if ($approval->status === 'Proceed')
                                                <span class="btn btn-success">Proceed</span>
                                            @elseif ($approval->status === 'Decline')
                                                <span class="btn btn-danger">Decline</span>
                                            @else
                                                <span class="btn btn-primary">New</span>
                                            @endif
                                            </td>
                                            <td>{{$approval->description}}</td>
                                            <td>
                                                <button class="btn btn-info" data-toggle="modal" data-target="#edit-modal">
                                                    <span class="glyphicon glyphicon-edit"></span> 
                                                </button>
                                                
                                                <a class="btn btn-danger" onclick="return myFunction();" href="{{ route('approval.delete',['approval_id' => $approval->approval_id]) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                		</tr>
                                		@endforeach
		                            </tbody>
		                        </table>
			                 {{ $approvals->links() }}
			            </div>
			        </div>
			    </div>
			</div>
		</div>

<!-- Approval Modal -->
  <div class="modal fade" id="myApproval" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="margin: 10">New Approval</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                    
                </div>
                <div class="modal-body">
                    <form action="{{ route('approval.submit') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Proposal Name</th>    
                                        <th scope="col">Status</th>
                                        <th scope="col">Description</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><input type="text" name="proposal_name" id="proposal_name-name" class="form-control" required=""></td>
                                        <td>
                                            <select name="status" id="approval-status" class="important form-control" required="">
                                                <option class="form-control">New</option>
                                                <option class="form-control">Proceed</option>
                                                <option class="form-control">Decline</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="description" id="description" class="form-control" autocomplete="off" required=""></td>
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

@foreach($approvals as $approval)
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
                <form action="{{ route('approval.update',['approval_id' => $approval->approval_id]) }}" method="post" class="form-horizontal" role="form">
                        @csrf
                        @method('PATCH')
                <div class="modal-body">

                        <div class="form-group">
                            <label for="proposal_name" class="col-md-2 col-form-label text-md-right">{{ __('Proposal Name') }}</label>
                            <div class="col-md-8">                               
                                <input id="proposal_name" type="text" value="{{ @$approval['proposal_name'] }}"  class="form-control" name="proposal_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-8">                               
                                <select name="status" id="approval-status" class="important form-control" required="">
                                    <option class="form-control">Proceed</option>
                                    <option class="form-control">Decline</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-8">                               
                                <input id="description" type="text" value="{{ @$approval['description'] }}"  class="form-control" name="description">
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