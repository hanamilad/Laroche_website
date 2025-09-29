<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as CartModel;
use App\Models\CartItem;

class Cart extends Component
{
    public $items = [];
    public $total = 0;

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        if (!Auth::check()) {
            $this->items = [];
            $this->total = 0;
            return;
        }

        $cart = CartModel::with('items.product')->firstOrCreate(['user_id' => Auth::id()]);
        $this->items = $cart->items;
        $this->total = $cart->items->sum(fn($item) => ($item->product->discount_price ?? $item->product->price) * $item->quantity);
    }

    public function increaseQuantity($itemId)
    {
        $item = CartItem::find($itemId);
        if ($item) {
            $item->quantity += 1;
            $item->save();
            $this->loadCart();
        }
    }

    public function decreaseQuantity($itemId)
    {
        $item = CartItem::find($itemId);
        if ($item && $item->quantity > 1) {
            $item->quantity -= 1;
            $item->save();
            $this->loadCart();
        }
    }

    public function removeItem($itemId)
    {
        $item = CartItem::find($itemId);
        if ($item) {
            $item->delete();
            $this->loadCart();
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
