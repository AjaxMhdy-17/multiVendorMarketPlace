<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycVerification extends Model
{
    protected $fillable = ['user_id', 'document_type', 'document_number', 'documents', 'status', 'reject_reason'];
}
