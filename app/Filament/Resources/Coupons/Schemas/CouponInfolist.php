<?php

namespace App\Filament\Resources\Coupons\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;

class CouponInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('code')
                    ->label('Coupon Code')
                    ->content(fn ($record) => $record->code),

                Placeholder::make('discount')
                    ->label('Discount Amount')
                    ->content(fn ($record) => $record->discount),

                Placeholder::make('type')
                    ->label('Type')
                    ->content(fn ($record) => $record->type),

                Placeholder::make('expires_at')
                    ->label('Expires At')
                    ->content(fn ($record) => $record->expires_at),

                Placeholder::make('created_at')
                    ->label('Created At')
                    ->content(fn ($record) => $record->created_at),

                Placeholder::make('updated_at')
                    ->label('Updated At')
                    ->content(fn ($record) => $record->updated_at),
            ]);
    }
}
