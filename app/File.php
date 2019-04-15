<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
    	'document', 'status'
    ];

    protected $table = 'files';

    protected $primaryKey = 'file_id';
}
