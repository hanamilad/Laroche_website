<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HeroSectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('section_key'),
                TextEntry::make('title'),
                TextEntry::make('subtitle')
                    ->placeholder('-'),
                TextEntry::make('body')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('image_path')
                    ->disk('public')
                    ->label('Image')
                    ->placeholder('-'),

                TextEntry::make('image_alt')
                    ->label('Alt Text')
                    ->placeholder('-'),

                TextEntry::make('image_position')
                    ->badge()
                    ->colors([
                        'primary' => 'left',
                        'success' => 'center',
                        'warning' => 'right',
                    ]),

                TextEntry::make('cta_text')
                    ->placeholder('-'),
                TextEntry::make('cta_url')
                    ->placeholder('-'),
                TextEntry::make('display_order')
                    ->numeric(),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
