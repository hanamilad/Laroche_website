<?php

namespace App\Filament\Widgets;

use App\Models\AdminLog;
use Filament\Widgets\TableWidget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class AdminActivity extends TableWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return AdminLog::query()->latest()->take(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('admin.name')
                ->label('EmployeeName')
                ->default('EmployeeName')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('action')
                ->label('Action')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'create' => 'success',
                    'update' => 'warning',
                    'delete' => 'danger',
                    default => 'info',
                })
                ->formatStateUsing(fn ($state) => ucfirst($state)),

            Tables\Columns\TextColumn::make('model')
                ->label('Model')
                ->formatStateUsing(fn ($state) => class_basename($state))
                ->searchable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('الوقت')
                ->dateTime('Y-m-d H:i')
                ->sortable()];
    }
}
