<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionDocument extends Model
{
    protected $guarded = [];

    public function document()
    {
        return $this->belongsTo(Document::class)->distinct()->where('is_deleted', '0');
    }

    public function uploadedDocument()
    {
        return $this->belongsTo(AgentPositionTypeTransactionDocument::class, 'document_id', 'document_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
