<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycVerification extends Model
{
    protected $fillable = ['user_id', 'document_type', 'document_number', 'documents', 'status', 'reject_reason'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->orderBy('created_at', 'desc');
    }
}
