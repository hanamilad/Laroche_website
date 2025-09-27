<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('order_id')
                ->relationship('order', 'id')
                ->label('Order')
                ->required(),

            TextInput::make('amount')
                ->numeric()
                ->required()
                ->label('Amount'),

            Select::make('payment_method')
                ->options([
                    'credit_card' => 'Credit Card',
                    'paypal'      => 'PayPal',
                    'cash'        => 'Cash',
                ])
                ->required(),

            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'paid'    => 'Paid',
                    'failed'  => 'Failed',
                ])
                ->default('pending'),

            TextInput::make('transaction_id')
                ->label('Transaction ID'),
        ]);
    }
}
