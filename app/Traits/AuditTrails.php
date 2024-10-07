<?php

namespace App\Traits;

use App\Models\AuditTrail;

trait AuditTrails
{
    /**
     * Boot the audit trail trait.
     *
     * This method will listen to model events and log them.
     */
    public static function bootAuditTrails()
    {
        static::created(function ($model) {
            self::logAudit($model, 'create');
        });

        static::updated(function ($model) {
            self::logAudit($model, 'update');
        });

        static::deleted(function ($model) {
            self::logAudit($model, 'delete');
        });
    }

    /**
     * Log the audit trail entry.
     *
     * @param mixed $model
     * @param string $action
     * @return void
     */
    protected static function logAudit($model, $action)
    {
        $dataBefore = null;
        $dataAfter = null;

        // Capture the data before the change
        if ($action === 'update' || $action === 'delete') {
            $dataBefore = json_encode($model->getOriginal());
        }

        // Capture the data after the change
        if ($action === 'create' || $action === 'update') {
            $dataAfter = json_encode($model->getAttributes());
        }

        // Create a new audit trail entry
        AuditTrail::create([
            'user_id' => 1,
            'entity_type' => get_class($model),
            'entity_id' => $model->id,
            'action' => $action,
            'data_before' => $dataBefore,
            'data_after' => $dataAfter,
        ]);
    }
}
