<?php
namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrdersSummary extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', Order::count())
                ->description('جميع الطلبات حتى الآن'),

            Stat::make('Completed Orders', Order::where('status', 'completed')->count())
                ->description('عدد الطلبات المكتملة'),

            Stat::make('Pending Orders', Order::where('status', 'pending')->count())
                ->description('عدد الطلبات المعلقة'),

            Stat::make('Total Revenue', 'EGP ' . number_format(Order::where('status', 'completed')->sum('total')))
                ->description('إجمالي الإيرادات'),
        ];
    }
}
