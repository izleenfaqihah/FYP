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
        <div class="row justify-content-center">

                <input type="text"  placeholder="Search" name="search">
                <button class="btn fa fa-search my-2 my-sm-0" style="font-size:24px;color:grey" type="submit"></button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn" style="font-size:18px;color:grey" data-toggle="modal" data-target="#myModal2"><i class="fa fa-upload"></i> Upload</button>
            <div class="col-md-9"><br>
            <div class="panel panel-default">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Date Added</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            
                            
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button class="edit-modal btn btn-info">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#delete-modal">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
                                    </td>
                                </tr>
                            
                            
                        </tbody>
                    </table>
            </div><!-- /.panel panel-default -->
            </div>
        </div>
    </div><!-- /.col-md-8 -->

    <!-- jQuery -->
    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Upload Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="margin: 10">Upload File</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <form method="post" id="upload_form" enctype='multipart/form-data'>
                         
                         <input type="file" name="upload_file" />
                         <br />
                         <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="delete-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="margin: 10">Are you sure you want to delete?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>      
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <a href="#">
                            <button type="button" value="delete" name="submitbutton" class="btn btn-primary">
                            <span class="glyphicon glyphicon-trash"></span> YES </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>


	

</body>
</html>

@endsection