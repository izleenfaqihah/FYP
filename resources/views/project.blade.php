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



    <style>
        .panel-heading {
            padding: 0;
        }
        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .panel-heading li {
            float: left;
            border-right:1px solid #bbb;
            display: block;
            padding: 14px 16px;
            text-align: center;
        }
        .panel-heading li:last-child:hover {
            background-color: #ccc;
        }
        .panel-heading li:last-child {
            border-right: none;
        }
        .panel-heading li a:hover {
            text-decoration: none;
        }

        .table.table-bordered tbody td {
            vertical-align: baseline;
        }
        .container {
        margin-left: 16%;
    }
    </style>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">

                <input type="text"  placeholder="Search" name="search">
                <button class="btn fa fa-search my-2 my-sm-0" style="font-size:24px;color:grey" type="submit"></button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <button class="btn" id="myBtn" style="font-size:18px;color:grey"><i class="glyphicon glyphicon-plus"></i> New Folder</button> -->
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn" style="font-size:18px;color:grey" data-toggle="modal" data-target="#myModal2"><i class="fa fa-upload"></i> Upload</button>
            <div class="col-md-10"><br>
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue">
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
                                <th>Category</th>
                                <th>Date Added</th>
                                <th>Actions</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                            
                            <!-- @foreach($folders as $folder)
                                <tr>
                                    <td><a href="{{ route('folderDetails',$folder->folder_id) }}">{{$folder->folder_name}}</a></td>
                                    <td></td>
                                    <td>{{$folder->created_at}}</td>
                                    <td>
                                        
                                        <button class="btn btn-info" data-toggle="modal" data-target="#edit-modal">
                                        <span class="glyphicon glyphicon-edit"></span> </button>
                                
                                        <a class="btn btn-danger" onclick="return myFunction();" href="{{ route('folder.delete',['folder_id' => $folder->folder_id]) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach -->

                            @foreach($file as $fi)
                                <tr>   
                                    
                                    <td><a href ="<?php echo asset("storage/files/$fi->document")?>">{{ basename($fi->document) }}</td> </a>
                                    <td>{{$fi->category}}</td>
                                    <td>{{$fi->created_at}}</td>
                                    <td>
                                        
                                        <a href="{{ route('file.edit',['file_id' => $fi->file_id]) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                
                                        <a class="btn btn-danger" onclick="return myFunction();" href="{{ route('file.delete',['file_id' => $fi->file_id]) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
            </div><!-- /.panel-body -->

            </div><!-- /.panel panel-default -->
            </div>
        </div>
    </div><!-- /.col-md-8 -->

    <!-- new folder modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="margin: 10">Enter Folder Name</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                    
                </div>
                <div class="modal-body">
                    <form action="{{ route('folder.submit') }}" method="POST" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        <table class="table">
                            <tbody>
                                <td><input type="text" name="folder_name" id="folder-name" class="form-control" required=""></td> 
                                        <!-- Add Task Button -->
                                <td>
                                    <button type="submit"  class="btn btn-success" name="submitbutton" value="folder">
                                        <span class='glyphicon glyphicon-check'></span> Add
                                    </button>
                                </td>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
</div>



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
                        <button type="submit" class="btn btn-success" style="margin-top:10px" name="submitbutton" value="upload">
                        <span class="glyphicon glyphicon-upload"></span> Upload </button>
                        <button type="button" class="btn btn-warning" style="margin-top:10px" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Cancel </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

<script>
//new folder
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

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