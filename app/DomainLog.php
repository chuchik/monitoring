<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainLog extends Model
{
    protected $fillable = ['agent_id', 'site_id', 'status','p80', 'p443', 'date', 'timezone'];

    public $timestamps = false;


}
