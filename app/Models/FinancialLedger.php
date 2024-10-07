<?php

namespace App\Models;

use App\Traits\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialLedger extends Model
{
    use HasFactory, AuditTrails;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
