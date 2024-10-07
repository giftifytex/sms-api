<?php

namespace App\Models;

use App\Trait\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, AuditTrails;

    // Users that has a permission
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permissions');
    }

    // Roles that have a permission
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
