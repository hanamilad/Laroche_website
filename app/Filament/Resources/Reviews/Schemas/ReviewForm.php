<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('user_id')
                ->relationship('user', 'name')
                ->label('User')
                ->required(),

            Select::make('product_id')
                ->relationship('product', 'name')
                ->label('Product')
                ->required(),

            TextInput::make('rating')
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Rating')
                ->required(),

            Textarea::make('comment')
                ->label('Comment')
                ->nullable(),
        ]);
    }
}
