<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;


class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('category')
                    ->label('Category')
                    ->content(fn($record) => $record->category->name),

                Placeholder::make('name')->label('Product Name')->content(fn($record) => $record->name),
                Placeholder::make('slug')->label('Slug')->content(fn($record) => $record->slug),
                Placeholder::make('description')->label('Description')->content(fn($record) => $record->description),
                Placeholder::make('price')->label('Price')->content(fn($record) => $record->price),
                Placeholder::make('discount_price')->label('Discount Price')->content(fn($record) => $record->discount_price),
                Placeholder::make('stock')->label('Stock')->content(fn($record) => $record->stock),
                Placeholder::make('is_active')->label('Active')->content(fn($record) => $record->is_active ? 'Yes' : 'No'),
                Placeholder::make('images')
                    ->label('Product Images')
                    ->content(
                        fn($record) =>
                        $record->images->map(
                            fn($img) =>
                            "<img src='{$img->image_url}' width='100' class='mr-2 mb-2' />"
                        )->join('')
                    )
                    ->html(),


                Placeholder::make('created_at')->label('Created At')->content(fn($record) => $record->created_at),
                Placeholder::make('updated_at')->label('Updated At')->content(fn($record) => $record->updated_at),
            ]);
    }
}
