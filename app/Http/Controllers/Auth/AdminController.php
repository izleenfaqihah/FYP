<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    public function showLoginForm()
  
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        //Validate the form data
         $this->validate($request,
          [ 
            'email' =>'required',
            'password' => 'required|min:6'
         ]);
        //Attempt to log user in
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]
        )) 
        {
              //if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        
        //if unsuccessful, then redirect to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }
     public function logout()
     {
            Auth::guard('admin')->logout();
            return redirect('/');
        }
}
