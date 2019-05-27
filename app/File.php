<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
    	'document', 'category',
    ];

    protected $table = 'files';

    protected $primaryKey = 'file_id';

    
}
