<?php

namespace App\Models;

use App\Trait\AuditTrails;
use App\Traits\AuditTrails as TraitsAuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory, TraitsAuditTrails;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_assignments');
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function loans()
    {
        return $this->hasMany(LoanAdvance::class);
    }

    public function salaries()
    {
        return $this->hasmany(Salary::class);
    }

    public function evaluation()
    {
        return $this->hasMany(TeacherEvaluation::class);
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
