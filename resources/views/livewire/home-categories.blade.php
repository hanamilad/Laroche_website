<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 justify-items-center">
    @foreach($categories as $category)
        <a href="{{ route('products.category', $category->slug) }}" class="flex flex-col items-center text-center group">
            <!-- صورة القسم -->
            <div class="w-40 h-40 rounded-full overflow-hidden bg-[#f5f1e8] flex items-center justify-center shadow-md transition-transform duration-300 group-hover:scale-105">
                <img src="{{ Storage::url($category->image_path) }}" 
                     alt="{{ $category->name }}" 
                     class="w-24 h-24 object-contain transition-transform duration-300 group-hover:scale-110" />
            </div>

            <!-- اسم القسم -->
            <h3 class="mt-3 text-gray-800 font-medium">{{ $category->name }}</h3>

            <!-- عدد المنتجات -->
            <p class="text-sm text-gray-500">{{ $category->products_count }} products</p>
        </a>
    @endforeach
</div>
