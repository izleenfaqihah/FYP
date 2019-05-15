<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['folder_name'];

    protected $primaryKey = 'folder_id';

    protected $table = 'folders';

    public function file(){
        return $this->hasMany('App\File');
    }

}
