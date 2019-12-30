<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

    protected $guarded = [];
    protected $dates = ['born_date'];
    protected $casts = [
        'born_date' => 'date:d/m/Y',
    ];

    public function contact()
    {
        return $this->hasOne(AgentContact::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
