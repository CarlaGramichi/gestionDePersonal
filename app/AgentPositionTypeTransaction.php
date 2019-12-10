<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentPositionTypeTransaction extends Model
{
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];

    public function agentPositionType()
    {
        return $this->belongsTo(AgentPositionType::class, 'agent_position_type_id')->with('agent', 'positionType', 'status');
    }

    public function documents()
    {
        return $this->hasMany(AgentPositionTypeTransactionDocument::class);
    }

    public function positionTypeTransactionStatuses()
    {
        return $this->hasMany(AgentPositionTypeTransactionStatus::class, 'agent_position_type_transaction_id')->with('transactionStatus')->orderByDesc('created_at');
    }


}
