<?php

namespace App\Models;

use App\Trait\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function guradians()
    {
        return $this->belongsToMany(Guardian::class, 'guradian_students');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function academicPerformance()
    {
        return $this->hasMany(AcademicPerformance::class);
    }

    public function disciplinaryRecords()
    {
        return $this->hasMany(DisciplinaryRecord::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function arm()
    {
        return $this->belongsTo(Arm::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function examSchedules()
    {
        return $this->hasMany(ExamSchedule::class, 'classroom_id', 'classroom_id');
    }

    public function financialLedgers()
    {
        return $this->hasMany(FinancialLedger::class);
    }

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }

    public function subjects()
    {
        return $this->hasMany(ClassSubject::class, 'classroom_id', 'classroom_id');
    }

    public function workSchemes()
    {
        return $this->hasManyThrough(
            WorkScheme::class,        // The model you want to access
            ClassSubject::class,      // The intermediate model
            'classroom_id',           // Foreign key on the ClassSubject table (related to Student)
            'class_subject_id',       // Foreign key on the WorkScheme table (related to ClassSubject)
            'id',                     // Local key on the Student table
            'id'                      // Local key on the ClassSubject table
        );
    }
}
