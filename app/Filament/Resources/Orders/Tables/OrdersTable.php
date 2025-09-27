<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // ✅ رقم الطلب
                TextColumn::make('id')
                    ->label('Order #')
                    ->sortable()
                    ->searchable(),

                // ✅ العميل
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),

                // ✅ الحالة
                BadgeColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'processing',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ]),

                // ✅ الإجمالي
                TextColumn::make('total')
                    ->label('Total')
                    ->money('usd')
                    ->sortable(),

                // ✅ وسيلة الدفع
                TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->sortable(),

                // ✅ تاريخ الإنشاء
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // فلتر حسب الحالة
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),

                // فلتر الطلبات الجديدة (آخر 7 أيام)
                Filter::make('recent')
                    ->label('Recent Orders')
                    ->query(fn ($query) => $query->where('created_at', '>=', now()->subDays(7))),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
