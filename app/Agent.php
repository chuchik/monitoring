<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['name', 'token', 'owner_id', 'description'];

    public function owner(){
        return $this->belongsTo(User::class, 'id', 'owner_id');
    }

    public function sites(){
        return $this->hasMany(Site::class, 'agent_id', 'id');
    }
}
