<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerCourseDivision extends Model
{
    protected $guarded = [];

    public function course(){
        return $this->belongsTo(CareerCourse::class,'career_course_id')->with('career');
    }
}
