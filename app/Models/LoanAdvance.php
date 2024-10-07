<?php

namespace App\Models;

use App\Traits\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAdvance extends Model
{
    use HasFactory, AuditTrails;

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
