<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = ['proposal_name','status','description'];

    protected $table = 'approvals';

    protected $primaryKey = 'approval_id';
}
