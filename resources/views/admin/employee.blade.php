@extends('layouts.app2')

@section('content')

<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
</head>
<style>
    .list-group {
  height: 100%;
  position: absolute;
  top: 55px;
  width: 225px;
  overflow: hidden;
}

</style>

<body>

    <div class="list-group">
   
    <a href="{{ route('admin.dashboard') }}" class="list-group-item"><i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a>  
    <a href="{{ route('admin.register') }}" class="list-group-item"><i class="glyphicon glyphicon-list"></i> <span>Register Employee</span></a>
    <a href="{{ route('admin.employee') }}" class="list-group-item"><i class="glyphicon glyphicon-user"></i> <span>Employee List</span></a>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-12" style="padding-left: 150px">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" align="center" style="background-color: #6cb2eb">All The Employees</div>
                <div class="card-body">
                    {{csrf_field()}}  
                      <table class="table table-hover">
                        <tbody>
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col" style="width:20%">Phone Number</th>
                              <th scope="col">Address</th>
                              <th scope="col">Action</th>
                              </tr>
                          </thead>
                          @foreach($employees as $employee)
                            <tr>
                              <td>{{$employee->employee_number}}</td>
                              <td>{{$employee->employee_name}}</td>
                              <td>{{$employee->employee_email}}</td>
                              <td>{{$employee->employee_phone}}</td>
                              <td>{{$employee->employee_address}}</td>
                              <td style="width:20%">
                              
                                <a href="{{ route('admin.edit',['employee_id' => $employee->employee_id]) }}" class="btn btn-outline-info"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                                        
                                <a class="btn btn-outline-danger" onclick="return myFunction();" href="{{ route('admin.delete',['employee_id' => $employee->employee_id]) }}">
                                  <i class="fa fa-trash">Delete</i>
                                </a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table> 
                      {{ $employees->links() }}    
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <script type="text/javascript">
    function myFunction() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }


  </script>

    
</body>
</html>


@endsection
