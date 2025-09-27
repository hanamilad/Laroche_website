<?php

namespace App\Filament\Resources\Coupons\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;


class CouponForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('code')
                ->label('Coupon Code')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(50),

            TextInput::make('discount')
                ->label('Discount Amount')
                ->required()
                ->numeric()
                ->minValue(0),

            Select::make('type')
                ->label('Type')
                ->options([
                    'fixed' => 'Fixed',
                    'percent' => 'Percent',
                ])
                ->required(),

            DatePicker::make('expires_at')
                ->label('Expires At')
                ->nullable(),
            ]);
    }
}
