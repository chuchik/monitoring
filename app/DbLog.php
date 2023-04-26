<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DbLog extends Model
{
    protected $fillable = ['agent_id', 'status', 'connections', 'date', 'timezone'];

    public $timestamps = false;


}
