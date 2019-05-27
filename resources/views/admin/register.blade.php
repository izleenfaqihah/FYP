@extends('layouts.app2')

@section('content')

<!DOCTYPE html>
<html>
<head>  
    <meta charset="utf-8">
    
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
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header" align="center" style="background-color: #6cb2eb">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_number" class="col-md-4 col-form-label text-md-right">{{ __('Employee Number') }}</label>

                            <div class="col-md-6">
                                <input id="employee_number" type="employee_number" class="form-control{{ $errors->has('employee_number') ? ' is-invalid' : '' }}" name="employee_number" value="{{ old('employee_number') }}" required>

                                @if ($errors->has('employee_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('employee_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_phone" class="col-md-4 col-form-label text-md-right">{{ __('Employee Phone') }}</label>

                            <div class="col-md-6">
                                <input id="employee_phone" type="employee_phone" class="form-control{{ $errors->has('employee_phone') ? ' is-invalid' : '' }}" name="employee_phone" value="{{ old('employee_phone') }}" required>

                                @if ($errors->has('employee_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('employee_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_address" class="col-md-4 col-form-label text-md-right">{{ __('Employee Address') }}</label>

                            <div class="col-md-6">
                                <input id="employee_address" type="employee_address" class="form-control{{ $errors->has('employee_address') ? ' is-invalid' : '' }}" name="employee_address" value="{{ old('employee_address') }}" required>

                                @if ($errors->has('employee_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('employee_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6" style="padding-top: 6px">
                                 <input type="radio" name="gender"  id="gender" value="male"> Male</input> &nbsp; &nbsp;
                                 <input type="radio"  name="gender" id="gender" value="female" > Female</input>
                             
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="add" name="register">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>

@endsection
