<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use App\Traits\Roles;
use App\Traits\AuditTrails;
use App\Traits\Permissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, Roles, Permissions, AuditTrails;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    //Associated student record
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    //Guardian/Parent data associated
    public function guradian()
    {
        return $this->hasOne(Guardian::class);
    }

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }
    // Roles Assigned to a user
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    // Specific permissions a user has

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    // School Calendar records created.
    public function schoolCalendars()
    {
        return $this->hasMany(SchoolCalendar::class, 'created_by');
    }

    public function enteredPayments()
    {
        return $this->hasMAny(Payment::class, 'created_by');
    }
}
