<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Three extends Model
{
    protected $fillable = ['three_name'];

    protected $primaryKey = 'three_id';

    protected $table='threes';
}
