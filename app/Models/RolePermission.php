<?php

namespace App\Models;

use App\Trait\AuditTrails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory, AuditTrails;
}
