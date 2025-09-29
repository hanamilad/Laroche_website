<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class HeaderSearch extends Component
{
    public string $query = '';
    public $results = [];

    public function updatedQuery()
    {
        $this->results = Product::where('is_active', true)
            ->where('name', 'like', '%' . $this->query . '%')
            ->take(5)
            ->get();
    }



    public function render()
    {
        return view('livewire.header-search');
    }
}
