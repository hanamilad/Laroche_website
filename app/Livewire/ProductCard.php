<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductCard extends Component
{
    public $product;

    public function addToCart()
    {
        if (!Auth::check()) {
            session()->flash('error', 'You need to login first.');
            return redirect()->route('login');
        }

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = $cart->items()->where('product_id', $this->product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $this->product->id,
                'quantity' => 1,
            ]);
        }

        $this->dispatch('cartUpdated');

        session()->flash('success', 'Product added to cart!');
    }

    public function render()
    {
        $averageRating = $this->product->reviews()->avg('rating') ?? 0;

        return view('livewire.product-card', [
            'averageRating' => $averageRating
        ]);
    }
}
