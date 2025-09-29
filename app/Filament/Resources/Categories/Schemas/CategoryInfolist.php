<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('name')
                    ->label('Name')
                    ->content(fn($record) => $record->name),

                Placeholder::make('slug')
                    ->label('Slug')
                    ->content(fn($record) => $record->slug),
                ImageEntry::make('image_path')
                    ->disk('public')
                    ->label('Image')
                    ->placeholder('-'),

                Placeholder::make('description')
                    ->label('Description')
                    ->content(fn($record) => $record->description),

                Placeholder::make('created_at')
                    ->label('Created At')
                    ->content(fn($record) => $record->created_at),

                Placeholder::make('updated_at')
                    ->label('Updated At')
                    ->content(fn($record) => $record->updated_at),
            ]);
    }
}
