<?php

namespace App\Traits;

use App\Models\Permission;

trait Permissions
{
    /**
     * Assign a permission to the user.
     *
     * @param mixed $permission
     * @return void
     */
    public function assignPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->firstOrFail();
        }

        // Attach the permission to the user using the pivot table
        $this->permissions()->attach($permission);
    }

    /**
     * Remove a permission from the user.
     *
     * @param mixed $permission
     * @return void
     */
    public function removePermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->firstOrFail();
        }

        // Detach the permission from the user
        $this->permissions()->detach($permission);
    }

    /**
     * Check if the user has a specific permission.
     *
     * @param mixed $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        return $this->permissions()->where('id', $permission->id)->exists();
    }
}
