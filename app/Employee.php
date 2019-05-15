<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_number', 'employee_name', 'employee_email', 'employee_phone', 'employee_address',
    ];

    protected $primaryKey = 'employee_id';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
