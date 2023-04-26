<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RamLog extends Model
{
    protected $fillable = ['agent_id', 'summary', 'used', 'date', 'timezone'];

    public $timestamps = false;

}
