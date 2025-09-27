<?php

use App\Filament\Widgets\AdminActivity;
use App\Filament\Widgets\OrdersSummary;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected string $view = 'filament.pages.dashboard';

    protected function getWidgets(): array
    {
        return [
            OrdersSummary::class,  // تظهر أول
            AdminActivity::class,  // تظهر بعده
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return []; // خليها فاضية
    }
}
