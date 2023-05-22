<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['owner_id', 'agent_id', 'name','domain','hearth_bit', 'check_word'];

    public function agent(){
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
}
