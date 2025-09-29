<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as CartModel;

class HeaderCart extends Component
{
    public $items = [];
    public $totalItems = 0;

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        if (!Auth::check()) {
            $this->items = [];
            $this->totalItems = 0;
            return;
        }

        $cart = CartModel::with('items.product')->firstOrCreate(['user_id' => Auth::id()]);
        $this->items = $cart->items;
        $this->totalItems = $cart->items->sum('quantity');
    }

    public function render()
    {
        return view('livewire.header-cart');
    }
}
