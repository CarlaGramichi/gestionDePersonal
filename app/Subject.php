<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(CareerCourse::class, 'career_course_id')->with('career');
    }

    public function division()
    {
        return $this->belongsTo(CareerCourseDivision::class, 'career_course_division_id');
    }

    public function regimen(){
        return $this->belongsTo(Regimen::class);
    }
}
