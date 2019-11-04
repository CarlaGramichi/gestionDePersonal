<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

    protected $guarded = [];

    public function contact(){
        return $this->hasOne(AgentContact::class);
    }
}
