<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
use Illuminate\Http\Request;

class Task extends Model
{
	protected $fillable = ['name'];

    protected $table = 'tasks';

    public function create(Request $request){
        //create new task
        $tasks = new Task();
        $tasks->name=$request->input('name');
        $tasks->save();
    }

    public function task(){
        return $this->belongsTo('App\Task');
    }
}