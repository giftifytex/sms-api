<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait ActivityLogs
{
    /**
     * Log an activity.
     *
     * @param string $action The action performed (e.g., 'create', 'update')
     * @param string|null $entityType The type of entity affected (e.g., 'User', 'Post')
     * @param int|null $entityId The ID of the entity affected
     * @param string|null $description A description of the action
     * @param array|null $data Additional data to log (optional)
     * @return void
     */
    public function logActivity($action, $details)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'details' => $details,
            'ip_address' => request()->ip(),
        ]);
    }
}
