<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Event;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Calendar;

class TaskController extends Controller
{
     public function getTask()
    {
    		// $tasks = Task::paginate(3);
    		// return view('task', compact('tasks'));

      $user_id = auth()->user()->user_id;
      $user = User::find($user_id);
      return view('task')->with('tasks',$user->tasks);

    }

    public function search (Request $request)
    {
        $search = $request -> get('search');
        $tasks = DB::table('tasks')
        -> where ('name', 'like', '%' .$search.'%')
        -> orWhere ('project_name', 'like', '%' .$search.'%')->paginate(5);
        return view('task', compact('tasks'));
    }


     public function store(Request $request)
    {

      $this->validate($request,[
        'user_id' => 'required|string|max:255',
        'project_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'start_date' => 'required|date|max:255',
        'due_date' => 'required|date|max:255',
        ]);

      $task_id = DB::table('tasks')->insertGetId(array(
        'user_id' => $request -> user_id,
        'project_name' => $request -> project_name,
        'name' => $request -> name,
        'status' => $request -> status,
        'percentage' => '0',
        'priority' => "",
        'start_date' => $request -> start_date,
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
      // 
    }

     public function update(Request $request, $id)
    {
        $this->validate($request,[
          'project_name' => 'required',
          'name' => 'required',
          'status' => 'required',
          'percentage' => 'required',
          'priority' => 'required',
          'start_date' => 'required',
          'due_date' => 'required',
        ]);

        $tasks = Task::find($id);
        $tasks->project_name = $request->get('project_name');
        $tasks->name = $request->get('name');
        $tasks->status = $request->get('status');
        $tasks->percentage = $request->get('percentage');
        $tasks->priority = $request->get('priority');
        $tasks->start_date = $request->get('start_date');
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

      return redirect('task')->with('Success');

      
    }
    
}
?>