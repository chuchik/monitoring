<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitesPingPong extends Model
{
    protected $fillable = ['agent_id', 'site_id', 'method_hearth', 'response_code','is_success'];
}
