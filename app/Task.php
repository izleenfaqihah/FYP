<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
use Illuminate\Http\Request;

class Task extends Model
{
	protected $fillable = ['name','status','due_date'];

    protected $table = 'tasks';

    public function create(Request $request){
        //create new task
        $tasks = new Task();
        $tasks -> name =$request -> input('name');
        $tasks -> status =$request -> input('status');
        $tasks -> due_date =$request -> input('due_date');
        
        
        $tasks->save();
    }

    public function task(){
        return $this->belongsTo('App\Task');
    }

    public function event(){
        return $this->belongsTo('App\Event');
    }
}