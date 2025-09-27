<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Customer')
                    ->relationship('user', 'name')
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),

                TextInput::make('shipping_address')
                    ->label('Shipping Address')
                    ->required(),

                TextInput::make('billing_address')
                    ->label('Billing Address')
                    ->required(),

                TextInput::make('payment_method')
                    ->label('Payment Method')
                    ->nullable(),

                TextInput::make('total')
                    ->label('Total')
                    ->numeric()
                    ->required(),

                Repeater::make('items')
                    ->label('Order Items')
                    ->relationship('items')
                    ->schema([
                        Select::make('product_id')
                            ->label('Product')
                            ->relationship('product', 'name')
                            ->required(),

                        TextInput::make('quantity')
                            ->label('Quantity')
                            ->numeric()
                            ->required(),

                        TextInput::make('price')
                            ->label('Price')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(3)
                    ->createItemButtonLabel('Add Item'),
            ]);
    }
}
