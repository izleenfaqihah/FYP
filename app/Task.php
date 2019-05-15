<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
use Illuminate\Http\Request;

class Task extends Model
{
	protected $fillable = ['project_name','name','status', 'percentage', 'priority', 'start_date', 'due_date'];

    protected $primaryKey = 'task_id';

    public $timestamps = true;

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}