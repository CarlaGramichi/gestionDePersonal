<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentPositionTypeTransaction extends Model
{
    protected $guarded = [];

    public function agentPositionType(){
        return $this->belongsTo(AgentPositionType::class,'agent_position_type_id')->with('agent','positionType');
    }

    public function documents(){
        return $this->hasMany(AgentPositionTypeTransactionDocument::class);
    }

    public function status(){
        return $this->belongsTo(TransactionStatus::class,'transaction_status_id');
    }
}
