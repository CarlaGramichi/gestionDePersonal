<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionType extends Model
{
    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
