<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function pofs()
    {
        return $this->hasMany(Pof::class);
    }
}
