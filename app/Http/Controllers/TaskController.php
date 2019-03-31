<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Event;
use Illuminate\Support\Facades\DB;
use Calendar;

class TaskController extends Controller
{
     public function getTask()
    {
    		$tasks = Task::get();
    		return view('task', ['tasks' => $tasks]);

    }

    // public function create(Request $request){
    //     //create new task
    //     $tasks = new Task();
    //     $tasks -> name =$request -> input('name');
    //     $tasks -> status =$request -> input('status');
    //     $tasks -> due_date =$request -> input('due_date');
    //     $tasks->save();
    // }


     public function store(Request $request)
    {

      $this->validate($request,[
        'name' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'due_date' => 'required|date|max:255',
        ]);

      $task_id = DB::table('tasks')->insertGetId(array(
        'name' => $request -> name,
        'status' => $request -> status,
        'due_date' => $request -> due_date
      ));
    	
        switch ($request->submitbutton) {
        case 'add':
          //add new task
          $events = new Event();
          $events->task_id = $task_id;
          $events->title = $request -> input('name');
          $events->start_event = $request -> input('due_date');
          $events->end_event = '2001-01-01';
          $events->save();

          break;
        
        default:
          $events = Event::find($id);
          $events->delete();
          break;
      }

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

    
    
    public function edit($id)
    {
      $tasks = Task::find($id);
      return view('task.edit', compact('task'));
    }

     public function update(Request $request, $id)
    {
        $this->validate($request,[
          'name' => 'required',
          'status' => 'required',
          'due_date' => 'required',
        ]);

        $tasks = Task::find($id);
        $tasks->name = $request->get('name');
        $tasks->status = $request->get('status');
        $tasks->due_date = $request->get('due_date');
        $tasks->save();
        return redirect('task')->with('Success');
      
    }
    
     public function destroy($id)
    {
    	$tasks = Task::find($id);
      $events = Event::where('task_id', $tasks -> task_id)->first();
      $events->delete();
      $tasks->delete();

      // DB::table("tasks")->where("id", $id)->delete();
      // DB::table("events")->where("id", $id)->delete();

      return redirect()->route('task');

      
    }
    
}
?>