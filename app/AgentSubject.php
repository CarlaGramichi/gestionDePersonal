<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentSubject extends Model
{
    protected $guarded = ['id'];

    public function schedules()
    {
        return $this->hasMany(AgentSubjectSchedule::class);
    }
}
