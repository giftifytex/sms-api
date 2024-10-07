<?php

namespace App\Traits;

use App\Models\Role;

trait Roles
{
    /**
     * Assign a role to the user.
     *
     * @param string|Role $role
     * @return void
     */
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }

        // Attach the role to the user using the pivot table
        $this->roles()->attach($role);
    }

    /**
     * Remove a role from the user.
     *
     * @param string|Role $role
     * @return void
     */
    public function removeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }

        // Detach the role from the user using the pivot table
        $this->roles()->detach($role);
    }

    /**
     * Check if the user has a specific role.
     *
     * @param string|array $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_array($role)) {
            return $this->roles->pluck('name')->intersect($role)->isNotEmpty();
        }
        return $this->roles->pluck('name')->contains($role);
    }

    /**
     * Check if the user has any of the provided roles.
     *
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole(array $roles)
    {
        return $this->roles->pluck('name')->intersect($roles)->isNotEmpty();
    }
}
