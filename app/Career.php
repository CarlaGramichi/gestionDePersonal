<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $guarded = ['id'];

    public function courses(){
        return $this->hasMany(CareerCourse::class);
    }
}
