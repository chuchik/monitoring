<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SshLog extends Model
{
    protected $fillable = ['agent_id', 'ip', 'user', 'date', 'timezone'];

    public $timestamps = false;


}
