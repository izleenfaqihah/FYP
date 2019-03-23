@extends('layouts.app')

@section('content')

{{ csrf_field() }}

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
			<nav class="navbar navbar-light bg-light">
			  <form class="form-inline">
			    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			    <button class="btn fa fa-search my-2 my-sm-0" style="font-size:24px;color:grey" type="submit"></button>
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <button class="btn" style="font-size:18px;color:grey" type="submit"><i class="fa fa-plus"></i> New Folder</button>
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <button class="btn" style="font-size:18px;color:grey" type="submit"><i class="fa fa-upload"></i> Upload</button>
			  </form>
			</nav>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<table class="table table-sm">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>
				      <th scope="col">Type</th>
				      <th scope="col">Size</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>
				      	<button class="btn btn-outline-info" type="submit"><i class="fa fa-edit"></i></button>
				      	<button class="btn btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button>
				      </td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Jacob</td>
				      <td>Thornton</td>
				      <td>@fat</td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td colspan="2">Larry the Bird</td>
				      <td>@twitter</td>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

@endsection