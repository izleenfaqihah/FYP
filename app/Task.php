<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
use Illuminate\Http\Request;

class Task extends Model
{
	protected $fillable = ['name','status', 'percentage', 'due_date'];

    protected $primaryKey = 'task_id';

    public function event(){
        return $this->hasMany(Event::class);
    }
}