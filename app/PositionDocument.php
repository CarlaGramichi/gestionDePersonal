<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionDocument extends Model
{
    protected $guarded = [];

    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function uploadedDocument(){
        return $this->belongsTo(AgentPositionTypeTransactionDocument::class,'document_id','document_id');
    }
}
