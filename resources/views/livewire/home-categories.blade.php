<section class="py-12 bg-gradient-to-b from-[#f9f7f2] to-white">
    <div class="container mx-auto px-4">
        <header class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                اكتشف مجموعاتنا المميزة
            </h2>
            <p class="text-gray-500 text-base md:text-lg">
                تصفّح الفئات واستكشف أحدث المنتجات لكل نوع
            </p>
        </header>

        <div 
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 sm:gap-8 justify-items-center">
            
            @foreach($categories as $category)
                <a 
                    href="{{ route('products.category', $category->slug) }}" 
                    title="{{ $category->name }}"
                    aria-label="عرض منتجات {{ $category->name }}"
                    class="flex flex-col items-center text-center group w-full max-w-[180px] hover:text-[#b89860] transition-colors duration-300">

                    <figure 
                        class="w-32 h-32 sm:w-36 sm:h-36 rounded-full overflow-hidden bg-[#f5f1e8] 
                               flex items-center justify-center shadow-md border border-[#e5dfd4] 
                               transition-transform duration-500 group-hover:scale-105 group-hover:shadow-lg">
                        
                        <img 
                            src="{{ Storage::url($category->image_path) }}" 
                            alt="صورة قسم {{ $category->name }}" 
                            loading="lazy"
                            width="140"
                            height="140"
                            class="w-24 h-24 object-contain transition-transform duration-500 group-hover:scale-110"
                        />
                    </figure>

                    <div class="mt-3">
                        <h3 class="text-gray-800 font-semibold text-sm sm:text-base line-clamp-1">
                            {{ $category->name }}
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">
                            {{ $category->products_count }} منتج
                        </p>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</section>
