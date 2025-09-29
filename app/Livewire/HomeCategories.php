<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class HomeCategories extends Component
{
    public $categories;

    public function mount()
    {
        // جلب كل الأقسام مع عدد المنتجات
        $this->categories = Category::withCount('products')->get();
    }

    public function render()
    {
        return view('livewire.home-categories');
    }
}
