<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships

    // Orders made by the user
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Payments made by the user through orders
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Order::class);
    }

    // User's cart
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    // Items in the user's cart
    public function cartItems()
    {
        return $this->hasManyThrough(CartItem::class, Cart::class);
    }

    // Reviews made by the user
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
