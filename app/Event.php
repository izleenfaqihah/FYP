<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	
    protected $fillable = ['title','start_date','end_date'];

    protected $table = 'events';
    
    public $timestamps = true;

    public function task()
    {
    	return $this->belongsTo(Task::class);
    }

    
}
