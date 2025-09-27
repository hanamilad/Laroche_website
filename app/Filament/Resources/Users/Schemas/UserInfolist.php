<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('name')
                    ->label('Name')
                    ->content(fn ($record) => $record->name),

                Placeholder::make('email')
                    ->label('Email')
                    ->content(fn ($record) => $record->email),

                Placeholder::make('email_verified_at')
                    ->label('Email Verified At')
                    ->content(fn ($record) => $record->email_verified_at),

                Placeholder::make('created_at')
                    ->label('Created At')
                    ->content(fn ($record) => $record->created_at),

                Placeholder::make('updated_at')
                    ->label('Updated At')
                    ->content(fn ($record) => $record->updated_at),
            ]);
    }
}
