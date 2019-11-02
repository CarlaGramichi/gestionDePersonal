<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pof extends Model
{

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
