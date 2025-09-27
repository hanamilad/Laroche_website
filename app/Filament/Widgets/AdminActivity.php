<?php

namespace App\Filament\Widgets;

use App\Models\AdminLog;
use Filament\Widgets\Widget;


class AdminActivity extends Widget
{
    protected string $view = 'filament.widgets.admin-activity';
   protected int | string | array $columnSpan = 'full'; // لو عايزها تاخد عرض أكبر

    public $logs;

    public function mount(): void
    {
        $this->logs = AdminLog::latest()->take(10)->get();
    }
}

