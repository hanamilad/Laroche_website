<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required(),

                TextInput::make('name')->label('Product Name')->required(),
                TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true),
                Textarea::make('description')->label('Description')->nullable(),
                TextInput::make('price')->label('Price')->numeric()->required(),
                TextInput::make('discount_price')->label('Discount Price')->numeric()->nullable(),
                TextInput::make('stock')->label('Stock')->numeric()->required(),
                Toggle::make('is_active')->label('Active')->default(true),

                Repeater::make('images')
                    ->label('Product Images')
                    ->relationship('images')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('products')
                            ->required(),

                        Toggle::make('is_main')->label('Main Image')->default(false),
                    ])
                    ->columns(2)
                    ->createItemButtonLabel('Add Image'),
            ]);
    }
}
