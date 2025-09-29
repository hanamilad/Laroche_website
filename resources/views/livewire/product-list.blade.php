<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- عنوان الفئات -->
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">التصنيفات</h2>
    <div class="flex justify-center flex-wrap gap-4 mb-10">
        @foreach(\App\Models\Category::all() as $category)
            <a href="{{ route('products.category', $category->slug) }}"
               class="px-4 py-2 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition text-gray-700 font-medium">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <!-- معرض المنتجات -->
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">المنتجات</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <livewire:product-card :product="$product" :wire:key="$product->id" />
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        {{ $products->links() }}
    </div>
</div>
