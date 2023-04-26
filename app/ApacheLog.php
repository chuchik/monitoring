<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApacheLog extends Model
{
    protected $fillable = ["agent_id", "date", "timezone", "details"];
    protected $casts = [
        "date" => "datetime",
        "details" => "object"
    ];

    public $timestamps = false;
}
