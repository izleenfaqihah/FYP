<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['folder_name'];

    protected $primaryKey = 'folder_id';

    protected $table = 'folders';

    public function filetwos(){
        return $this->hasMany('App\FileTwo', 'folder_id');
    }

}
