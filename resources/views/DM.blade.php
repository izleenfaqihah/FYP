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

                <input type="text"  placeholder="Search" name="search">
                <button class="btn fa fa-search my-2 my-sm-0" style="font-size:24px;color:grey" type="submit"></button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn" style="font-size:18px;color:grey" data-toggle="modal" data-target="#myModal2"><i class="fa fa-upload"></i> Upload</button>
            <div class="col-md-10"><br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul>
                        <li><i class="fa fa-file-text-o"></i> All the documents</li>
                        <!-- <a href="#" class="add-modal"><li></li></a> -->
                    </ul>
                </div>
        
            <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="postTable">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Date Added</th>
                                <th>Actions</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            
                            
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td>
                                        
                                        <button class="btn btn-info" data-toggle="modal" data-target="#edit-modal">
                                        <span class="glyphicon glyphicon-edit"></span> </button>
                                
                                        <a class="btn btn-danger" onclick="return myFunction();" href="#">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            
                            
                        </tbody>
                    </table>
            </div><!-- /.panel-body -->

            </div><!-- /.panel panel-default -->
            </div>
        </div>
    </div><!-- /.col-md-8 -->

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
                    <form action="{{ route('file.submit') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input id="document" type="file" class="form-control{{ $errors->has('document') ? ' is-invalid' : '' }}" name="document" value="{{ old('document') }}">
                                @if ($errors->has('document'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('document') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <button type="submit" class="btn btn-success" style="margin-top:10px">
                        <span class="glyphicon glyphicon-upload"></span> Upload </button>
                        <button type="button" class="btn btn-warning" style="margin-top:10px" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Cancel </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>



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