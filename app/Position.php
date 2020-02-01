<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(PositionDocument::class)->with('document', 'position')->where('is_deleted', '0');
    }

    public function types()
    {
        return $this->hasMany(PositionType::class);
    }
}
