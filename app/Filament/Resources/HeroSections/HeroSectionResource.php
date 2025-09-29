<?php

namespace App\Filament\Resources\HeroSections;

use App\Filament\Resources\HeroSections\Pages\CreateHeroSection;
use App\Filament\Resources\HeroSections\Pages\EditHeroSection;
use App\Filament\Resources\HeroSections\Pages\ListHeroSections;
use App\Filament\Resources\HeroSections\Pages\ViewHeroSection;
use App\Filament\Resources\HeroSections\Schemas\HeroSectionForm;
use App\Filament\Resources\HeroSections\Schemas\HeroSectionInfolist;
use App\Filament\Resources\HeroSections\Tables\HeroSectionsTable;
use App\Models\HeroSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'section_key';

    public static function form(Schema $schema): Schema
    {
        return HeroSectionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HeroSectionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHeroSections::route('/'),
            'create' => CreateHeroSection::route('/create'),
            'view' => ViewHeroSection::route('/{record}'),
            'edit' => EditHeroSection::route('/{record}/edit'),
        ];
    }
}
