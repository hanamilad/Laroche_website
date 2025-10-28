<?php

namespace App\Filament\Resources\SiteInfos\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class SiteInfosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('brand_name')->label('اسم البراند')->searchable(),
                TextColumn::make('locale')->label('اللغة'),
                IconColumn::make('contact_card_enabled')
                    ->boolean()
                    ->label('بطاقة التواصل'),
                TextColumn::make('updated_at')->label('آخر تحديث')->dateTime(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
