<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.product-list', [
            'products' => Product::with('reviews')->paginate(12)
        ]);
    }
}
