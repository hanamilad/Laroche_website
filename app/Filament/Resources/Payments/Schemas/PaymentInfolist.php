<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextEntry::make('id')->label('ID'),
            TextEntry::make('order.id')->label('Order ID'),
            TextEntry::make('amount')->label('Amount'),
            TextEntry::make('payment_method')->label('Method'),
            TextEntry::make('status')->label('Status'),
            TextEntry::make('transaction_id')->label('Transaction ID'),
            TextEntry::make('created_at')->dateTime()->label('Created At'),
        ]);
    }
}
