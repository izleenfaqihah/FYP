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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
            
              @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                <div>
                @endif
                <form action="{{action('EmployeeController@update', $id)}}" method="post" class="form-horizontal" role="form">
                        @csrf
                        @method('PATCH')
                <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Proposal Name') }}</label>
                            <div class="col-md-8">                               
                                <input id="name" type="text" value="{{ $employees->employee_name }}"  class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-8">                               
                                <input id="email" type="text" value="{{ $employees->employee_email }}"  class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                            <div class="col-md-8">                               
                                <input id="phone" type="text" value="{{ $employees->employee_phone }}"  class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-8">                               
                                <input id="address" type="text" value="{{ $employees->employee_address }}"  class="form-control" name="address">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-edit"></span> Yes </button>
                        <button type="submit" class="btn btn-warning" href="{{ url('/admin/employee') }}">
                            <span class='glyphicon glyphicon-remove'></span> Cancel
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
</div>
</body>
</html>


@endsection
