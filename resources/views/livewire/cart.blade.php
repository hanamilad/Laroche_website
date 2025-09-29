<div class="bg-white p-4 rounded-lg shadow w-full md:w-96">
    <h2 class="font-bold text-lg mb-3">Your Cart</h2>

    @if(count($items) == 0)
        <p class="text-gray-500">Your cart is empty.</p>
    @else
        <div class="space-y-3">
            @foreach($items as $item)
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $item->product->mainImage?->image_path ?? 'placeholder.jpg' }}" class="w-16 h-16 object-cover rounded">
                        <div>
                            <h3 class="font-semibold">{{ $item->product->name }}</h3>
                            <p class="text-gray-600">${{ $item->product->discount_price ?? $item->product->price }}</p>
                            <div class="flex items-center space-x-2 mt-1">
                                <button wire:click="decreaseQuantity({{ $item->id }})" class="px-2 bg-gray-200 rounded">-</button>
                                <span>{{ $item->quantity }}</span>
                                <button wire:click="increaseQuantity({{ $item->id }})" class="px-2 bg-gray-200 rounded">+</button>
                                <button wire:click="removeItem({{ $item->id }})" class="ml-2 text-red-600">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 font-bold text-lg">
            Total: ${{ $total }}
        </div>

        <a href="{{ route('checkout') }}" class="mt-3 inline-block w-full text-center bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Proceed to Checkout</a>
    @endif
</div>
