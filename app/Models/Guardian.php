<?php

namespace App\Models;

use App\Traits\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory, AuditTrails;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'guradian_students');
    }
}
