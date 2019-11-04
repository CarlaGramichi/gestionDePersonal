<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentContact extends Model
{
    protected $guarded = [];

    public function agent(){
        $this->belongsTo(Agent::class);
    }
}
