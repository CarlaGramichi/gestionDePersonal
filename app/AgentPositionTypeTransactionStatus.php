<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentPositionTypeTransactionStatus extends Model
{
    protected $guarded = [];

    public function transactionStatus()
    {
        return $this->belongsTo(TransactionStatus::class, 'transaction_status_id');
    }
}
