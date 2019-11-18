<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionDocument extends Model
{
    protected $guarded = [];

    public function document(){
        return $this->belongsTo(Document::class);
    }
}
