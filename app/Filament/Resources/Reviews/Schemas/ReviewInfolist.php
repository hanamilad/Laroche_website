<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;

class ReviewInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Placeholder::make('user.name')->label('User'),
            Placeholder::make('product.name')->label('Product'),
            Placeholder::make('rating')->label('Rating'),
            Placeholder::make('comment')->label('Comment'),
            Placeholder::make('created_at')->label('Created At'),
        ]);
    }
}
