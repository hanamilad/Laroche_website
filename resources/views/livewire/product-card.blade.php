<div class="border rounded-lg shadow-md hover:shadow-xl transition overflow-hidden flex flex-col">
    <div class="relative">
        <img src="{{ $product->main_image_url }}" alt="{{ $product->name }}"
             class="w-full h-48 object-cover">
        @if($product->discount_price > 0)
            <span class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">
                خصم
            </span>
        @endif
    </div>
    <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
            <p class="text-gray-600 mt-1">
                @if($product->discount_price > 0)
                    <span class="line-through text-gray-400">{{ $product->price }} ر.ق</span>
                    <span class="text-red-600 font-bold">{{ $product->discount_price }} ر.ق</span>
                @else
                    <span class="font-bold">{{ $product->price }} ر.ق</span>
                @endif
            </p>
            <p class="text-yellow-500 mt-1">Rating: {{ $product->reviews->avg('rating') ?? 0 }}/5</p>
        </div>
        <button wire:click="addToCart"
                class="mt-4 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            إضافة إلى السلة
        </button>
    </div>
</div>
