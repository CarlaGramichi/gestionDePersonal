<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionTypeHour extends Model
{
    protected $guarded = [];

    public function position_type(){
        return $this->belongsTo(PositionType::class)->with('position');
    }
}


