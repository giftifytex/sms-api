<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'entity_type', 'entity_id', 'action', 'data_before', 'data_after', 'ip_address', 'user_agent'];
}
