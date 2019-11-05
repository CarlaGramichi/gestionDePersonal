<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentContact extends Model
{
    protected $guarded = [];
    protected $dates = ['born_date'];

    public function agent(){
        $this->belongsTo(Agent::class);
    }
}
