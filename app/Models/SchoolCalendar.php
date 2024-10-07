<?php

namespace App\Models;

use App\Trait\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCalendar extends Model
{
    use HasFactory, AuditTrails;

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
