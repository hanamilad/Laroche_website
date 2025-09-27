<?php

namespace App\Observers;

use App\Models\AdminLog;

class AdminLogObserver
{
    protected function adminId(): ?int
    {
        // استخدام guard الافتراضي web في Breeze
        return auth('web')->id();
    }

    protected function log($action, $model)
    {
        // منع loop
        if ($model instanceof AdminLog) return;

        AdminLog::create([
            'admin_id' => $this->adminId(),
            'action' => $action,
            'model' => get_class($model),
            'description' => "تم {$action} " . get_class($model),
        ]);
    }

    public function created($model)
    {
        $this->log('إضافة', $model);
    }

    public function updated($model)
    {
        $this->log('تعديل', $model);
    }

    public function deleted($model)
    {
        $this->log('حذف', $model);
    }
}
