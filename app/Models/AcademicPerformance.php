<?php

namespace App\Models;

use App\Traits\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicPerformance extends Model
{
    use HasFactory, AuditTrails;
}
