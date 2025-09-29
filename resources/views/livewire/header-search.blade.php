<div class="relative">
    <input 
        type="text" 
        wire:model.live="query"
        placeholder="{{ __('Search for Products...') }}"
        class="w-64 lg:w-80 px-4 py-2 pr-10 rtl:pr-4 rtl:pl-10 rounded-full border border-gray-300 
               focus:outline-none focus:border-gray-400 focus:ring-1 focus:ring-gray-400 text-sm bg-white"
    >
    <button class="absolute right-3 rtl:right-auto rtl:left-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>

    {{-- نتائج البحث --}}
    @if(!empty($query))
        <div class="absolute mt-2 w-full bg-white border border-gray-200 rounded-lg shadow-lg z-50">
            @forelse($results as $product)
                <a href="{{ route('product.show', $product->slug) }}" 
                   class="flex items-center px-4 py-2 hover:bg-gray-50">
                    {{-- صورة المنتج --}}
                    <img src="{{ $product->main_image_url }}" 
                         alt="{{ $product->name }}" 
                         class="w-12 h-12 object-cover rounded mr-3" 
                         loading="lazy">
                    
                    <div class="flex-1">
                        <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                        <div class="text-xs text-gray-500">
                            ⭐ {{ $product->rating ?? 4.5 }} | {{ $product->price }} {{ __('ر.ق') }}
                        </div>
                    </div>
                </a>
            @empty
                <div class="px-4 py-2 text-sm text-gray-500">
                    {{ __('No results found') }}
                </div>
            @endforelse

            {{-- زر عرض المزيد --}}
            @if($results->count() >= 5)
                <a href="{{ route('products.index', ['q' => $query]) }}" 
                   class="block text-center text-blue-600 text-sm py-2 hover:bg-gray-50 font-medium border-t">
                   {{ __('Show more results') }}
                </a>
            @endif
        </div>
    @endif
</div>
