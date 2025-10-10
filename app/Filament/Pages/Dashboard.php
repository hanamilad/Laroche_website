<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AdminActivity;
use App\Filament\Widgets\OrdersSummary;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            OrdersSummary::class,
            AdminActivity::class,
        ];
    }

    public function getWidgetsLayout(): array
    {
        return [
            [OrdersSummary::class],
            [AdminActivity::class],
        ];
    }
}
