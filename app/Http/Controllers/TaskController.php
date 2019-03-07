<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function getTask()
    {
    	$tasks = Task::get();
    	return view('task', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    	'name' => 'required|max:255',
    ]);

    $tasks = new Task();
    $tasks->create($request);

    if(true) {
           $msg = [
                'message' => 'Success!',
               ];

           return redirect()->route('task')->with($msg);
        } else {
          $msg = [
               'error' => 'Some error!',
          ];
          return redirect()->route('task')->with($msg);
        }

    }


    
}
