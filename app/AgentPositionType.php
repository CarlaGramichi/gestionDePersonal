<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentPositionType extends Model
{
    protected $guarded = [];
    protected $casts = [
        'start_date'  => 'date:d/m/Y',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function positionType()
    {
        return $this->belongsTo(PositionType::class)->with('position');
    }
}
