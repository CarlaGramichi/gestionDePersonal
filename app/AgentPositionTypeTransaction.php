<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentPositionTypeTransaction extends Model
{
    protected $guarded = [];
    protected $casts = [
        'created_at'  => 'date:d/m/Y',
    ];

    public function agentPositionType()
    {
        return $this->belongsTo(AgentPositionType::class, 'agent_position_type_id')->with('agent', 'positionType');
    }

    public function documents()
    {
        return $this->hasMany(AgentPositionTypeTransactionDocument::class);
    }

    public function statuses()
    {
        return $this->hasMany(AgentPositionTypeTransactionStatus::class, 'agent_position_type_transaction_id')->with('status')->orderByDesc('created_at');
    }

}
