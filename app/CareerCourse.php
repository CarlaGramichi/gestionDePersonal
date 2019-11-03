<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerCourse extends Model
{
    protected $guarded = [];

    public function career(){
        return $this->belongsTo(Career::class);
    }
}
