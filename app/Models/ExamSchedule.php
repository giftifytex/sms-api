<?php

namespace App\Models;

use App\Traits\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    use HasFactory, AuditTrails;

    public function students()
    {
        $this->hasMany(Student::class, 'classroom_id', 'classroom_id');
    }
}
