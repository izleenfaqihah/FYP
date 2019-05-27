@extends('layouts.mail')

@section('content')

<h1>Welcome to <a href="{{ config('app.url') }}">{{ config('app.name') }}</a></h1>
    <p>
    </p>
    <p>
        Your account has been registered. You can now reset password and login.
    </p>
    <table>
        <tr>
            <td>
                <p>
                    <a href="{{ action('Auth\ResetPasswordController@showResetForm', [$token]) }}" type="button" class="btn-primary">
                       Reset password
                    </a>
                </p>
            </td>
        </tr>
    </table>

    <p><em>This link is valid until {{ Carbon\Carbon::now()->addMinutes(config('auth.passwords.users.expire'))->format('Y/m/d') }}.</em></p>
@endsection


