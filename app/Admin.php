<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

	protected $fillable = [
        'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $table = 'admins';

    public $primaryKey = 'id';

    protected $guard = 'admin';

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
