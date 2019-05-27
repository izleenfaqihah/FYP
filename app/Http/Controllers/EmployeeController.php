<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getEmployee()
    {
        return  view('admin.register');
    }

    public function showEmployee()
    {
        $employees = Employee::paginate(10);
        return view('admin.employee', compact('employees'));
    }

    public function search (Request $request)
    {
        $search = $request -> get('search');
        $employees = DB::table('employees')
        -> where ('employee_name', 'like', '%' .$search.'%')
        -> orWhere ('employee_email', 'like', '%' .$search.'%')->paginate(5);
        return view('employee', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch($request->register){
            case'add':
            //Create a new user
            $user= new User();
            $user->name = $request -> input('name');
            $user->email = $request -> input('email');
            $user->employee_number = $request -> input('employee_number');
            $user->employee_phone = $request -> input('employee_phone');
            $user->employee_address = $request -> input('employee_address');
            $user->role = 'Employee';
            $user->password = Hash::make($request['password']);
            $user->save();

            //Create new employee information
            $employees= new Employee();
            $employees->user_id = $user->user_id;
            $employees->employee_number =  $request -> input('employee_number');
            $employees->employee_name =  $request -> input('name');
            $employees->employee_email =  $request -> input('email');
            $employees->employee_phone =  $request -> input('employee_phone');
            $employees->employee_address =  $request -> input('employee_address');
            $employees->gender =  $request -> input('gender');
            $employees->save();

            User::sendWelcomeEmail($user);

            break;
        }

        return back()->with('success','Succesfully Registered!');

        // if(true) {
        //    $message = [
        //         'message' => 'Succesfully Registered!',
        //        ];

        //    return redirect()->route('admin.register')->with($message);
        // } else {
        //   $message = [
        //        'error' => 'Some error!',
        //   ];
        //   return redirect()->route('admin.register')->with($message);
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::find($id);

        return view('edit.eemployee', compact('employees', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
          'employee_number' => 'required',
          'employee_name' => 'required',
          'employee_email' => 'required',
          'employee_phone' => 'required',
          'employee_address' => 'required',
        ]);

        $employees = Employee::find($id);
        $employees->employee_number = $request->get('employee_number');
        $employees->employee_name = $request->get('employee_name');
        $employees->employee_email = $request->get('employee_email');
        $employees->employee_phone = $request->get('employee_phone');
        $employees->employee_address = $request->get('employee_address');
        $employees->save();

        // return redirect('admin.employee', compact('employees'));
        return back()->with('success','Succesfully Updated!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employees = Employee::find($id);
      $user = User::where('user_id', $employees -> user_id)->first();
      $user->delete();
      $employees->delete();

      return back()->with('success','Succesfully Deleted!');
    }
}
