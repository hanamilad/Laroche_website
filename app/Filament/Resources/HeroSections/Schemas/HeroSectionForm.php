<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('section_key')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('subtitle')
                    ->default(null),
                Textarea::make('body')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Image')
                    ->image()
                    ->disk('public')
                    ->directory('hero_section')
                    ->required(),
                TextInput::make('image_alt')
                    ->default(null),
                Select::make('image_position')
                    ->options(['left' => 'Left', 'right' => 'Right', 'center' => 'Center'])
                    ->default('left')
                    ->required(),
                TextInput::make('cta_text')
                    ->default(null),
                TextInput::make('cta_url')
                    ->url()
                    ->default(null),
                TextInput::make('display_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}


