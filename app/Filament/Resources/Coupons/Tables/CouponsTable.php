<?php

namespace App\Filament\Resources\Coupons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;

class CouponsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('code')
                    ->label('Coupon Code')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('discount')
                    ->label('Discount')
                    ->sortable(),

                TextColumn::make('type')
                    ->badge()
                    ->label('Type')
                    ->getStateUsing(fn ($record) => $record->type)
                    ->colors([
                        'primary' => fn ($state) => $state === 'fixed',
                        'success' => fn ($state) => $state === 'percent',
                    ]),

                TextColumn::make('expires_at')
                    ->label('Expires At')
                    ->date(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime(),
            ])
            ->filters([
                Filter::make('active')
                    ->label('Active Coupons')
                    ->query(fn ($query) => $query->whereNull('expires_at')->orWhere('expires_at', '>=', now())),
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
