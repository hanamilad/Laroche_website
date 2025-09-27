<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // ✅ صورة المنتج الرئيسية
                TextColumn::make('main_image_url')
                    ->label('Image')
                    ->html()
                    ->formatStateUsing(fn($state) => "<img src='{$state}' style='height:40px; width:40px; border-radius:50%; object-fit:cover;'>"),



                // ✅ اسم المنتج
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                // ✅ السعر
                TextColumn::make('price')
                    ->label('Price')
                    ->money('usd')
                    ->sortable(),

                // ✅ سعر الخصم
                TextColumn::make('discount_price')
                    ->label('Discount Price')
                    ->money('usd')
                    ->sortable(),

                // ✅ التصنيف
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                // ✅ المخزون
                TextColumn::make('stock')
                    ->label('Stock')
                    ->sortable(),

                // ✅ حالة التفعيل
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                // ✅ تاريخ الإنشاء
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime(),
            ])
            ->filters([
                // فلتر حسب الكاتيجوري
                SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Category'),

                // فلتر حسب حالة التفعيل
                SelectFilter::make('is_active')
                    ->options([
                        true => 'Active',
                        false => 'Inactive',
                    ]),
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
