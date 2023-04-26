<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HddLog extends Model
{
    protected $fillable = ['agent_id', 'summary', 'used', 'date', 'timezone'];

    public $timestamps = false;

}
