<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'born_date'];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
