<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('user')
                    ->label('Customer')
                    ->content(fn ($record) => $record->user->name),

                Placeholder::make('status')
                    ->label('Status')
                    ->content(fn ($record) => ucfirst($record->status)),

                Placeholder::make('shipping_address')
                    ->label('Shipping Address')
                    ->content(fn ($record) => $record->shipping_address),

                Placeholder::make('billing_address')
                    ->label('Billing Address')
                    ->content(fn ($record) => $record->billing_address),

                Placeholder::make('payment_method')
                    ->label('Payment Method')
                    ->content(fn ($record) => $record->payment_method),

                Placeholder::make('total')
                    ->label('Total')
                    ->content(fn ($record) => $record->total),

                Placeholder::make('items')
                    ->label('Order Items')
                    ->content(fn ($record) => 
                        $record->items->map(fn($item) => 
                            "{$item->product->name} - {$item->quantity} x {$item->price}"
                        )->join('<br>')
                    )
                    ->html(),

                Placeholder::make('created_at')
                    ->label('Created At')
                    ->content(fn ($record) => $record->created_at),

                Placeholder::make('updated_at')
                    ->label('Updated At')
                    ->content(fn ($record) => $record->updated_at),
            ]);
    }
}
