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
                        @foreach($three as $thr)  
                        <tbody> 
                                                     
                                <tr>
                                    <td><a href="<?php echo asset("storage/threeD/{$thr->three_name}")?>">{{ $thr->three_name }}</a></td>
                                    <td>{{ $thr->created_at }}</td>

                                    <td>
                                        
                                        <button class="btn btn-info" data-toggle="modal" data-target="#edit-modal">
                                        <span class="glyphicon glyphicon-edit"></span> </button>
                                
                                        <a class="btn btn-danger" onclick="return myFunction();" href="{{ route('Three.delete',['three_id' => $thr->three_id]) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr> 
                                                      
                        </tbody>
                        @endforeach
                    </table>
            </div><!-- /.panel-body -->
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
                    <form action="{{ route('Three.submit') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input id="three_name" type="file" class="form-control{{ $errors->has('three_name') ? ' is-invalid' : '' }}" name="three_name" value="{{ old('three_name') }}">
                                @if ($errors->has('three_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('three_name') }}</strong>
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
                <form action="#" method="post" class="form-horizontal" role="form">
                        @csrf
                        @method('PATCH')
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="three_name" class="col-md-2 col-form-label text-md-right">{{ __('Rename') }}</label>
                            <div class="col-md-8">                               
                                <input id="three_name" type="text" value="{{ @$thr['three_name'] }}"  class="form-control" name="three_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="created_at" class="col-md-2 col-form-label text-md-right">{{ __('Date') }}</label>
                            <div class="col-md-8">                               
                                <input id="created_at" type="text" value="{{ @$thr['created_at'] }}"  class="form-control" name="created_at">
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

  <script>
      // delete
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