<?php

namespace App\Models;

use App\Traits\AuditTrails;
use App\Traits\Permissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, Permissions, AuditTrails;

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

    // Permissions availlable to a role
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
