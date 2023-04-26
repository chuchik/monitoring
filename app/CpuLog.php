<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpuLog extends Model
{
    protected $fillable = ['agent_id', 'summary', 'date', 'timezone'];

    public $timestamps = false;

}
