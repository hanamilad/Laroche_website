<div x-data="{ open: false }" class="relative">
    <!-- Cart Button -->
    <button @click="open = !open" 
            class="relative p-2 text-gray-700 hover:text-gray-900 transition-colors group">
        <!-- Cart Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        
        <!-- Badge -->
        @if($totalItems > 0)
            <span class="absolute -top-1 -right-1 bg-green-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center animate-pulse">
                {{ $totalItems }}
            </span>
        @endif
    </button>

    <!-- Dropdown Cart -->
    <div x-show="open" 
         x-cloak 
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 rtl:right-auto rtl:left-0 mt-2 w-80 sm:w-96 bg-white rounded-lg shadow-xl border border-gray-200 z-50">

        @if(count($items) > 0)
            <!-- Cart Header -->
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 rounded-t-lg">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Shopping Cart') }}</h3>
                    <span class="text-sm text-gray-500">{{ $totalItems }} {{ __('items') }}</span>
                </div>
            </div>

            <!-- Cart Items -->
            <div class="max-h-80 overflow-y-auto">
                @foreach($items as $item)
                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start space-x-3 rtl:space-x-reverse">
                            <!-- Product Image -->
                            <div class="flex-shrink-0">
                                <img src="{{ $item->product->mainImage?->image_path ?? asset('images/placeholder.jpg') }}" 
                                     alt="{{ $item->product->name }}"
                                     class="w-16 h-16 object-cover rounded-md border border-gray-200">
                            </div>

                            <!-- Product Info -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-800 truncate">
                                    {{ $item->product->name }}
                                </h4>
                                
                                <!-- Price -->
                                <div class="mt-1 flex items-center space-x-2 rtl:space-x-reverse">
                                    @if($item->product->discount_price)
                                        <span class="text-sm font-bold text-green-600">
                                            {{ number_format($item->product->discount_price, 2) }} {{ __('EGP') }}
                                        </span>
                                        <span class="text-xs text-gray-400 line-through">
                                            {{ number_format($item->product->price, 2) }}
                                        </span>
                                    @else
                                        <span class="text-sm font-bold text-gray-800">
                                            {{ number_format($item->product->price, 2) }} {{ __('EGP') }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Quantity Controls -->
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="flex items-center space-x-1 rtl:space-x-reverse bg-gray-100 rounded-md">
                                        <button wire:click="decreaseQuantity({{ $item->id }})" 
                                                class="px-2 py-1 text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded-l-md transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                            </svg>
                                        </button>
                                        
                                        <span class="px-3 py-1 text-sm font-medium text-gray-800">
                                            {{ $item->quantity }}
                                        </span>
                                        
                                        <button wire:click="increaseQuantity({{ $item->id }})" 
                                                class="px-2 py-1 text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded-r-md transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Remove Button -->
                                    <button wire:click="removeItem({{ $item->id }})" 
                                            class="text-red-500 hover:text-red-700 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Cart Footer -->
            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                <!-- Total -->
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-medium text-gray-600">{{ __('Subtotal') }}:</span>
                    <span class="text-lg font-bold text-gray-800">
                        {{ number_format($items->sum(fn($item) => ($item->product->discount_price ?? $item->product->price) * $item->quantity), 2) }} {{ __('EGP') }}
                    </span>
                </div>

                <!-- Checkout Button -->
                <a href="{{ route('checkout') }}" 
                   wire:navigate
                   class="block w-full bg-green-600 hover:bg-green-700 text-white text-center font-medium py-2.5 rounded-lg transition-colors shadow-sm hover:shadow-md">
                    {{ __('Proceed to Checkout') }}
                </a>
                
                <!-- View Cart Link -->
                <a href="{{ route('cart') }}" 
                   wire:navigate
                   class="block w-full text-center text-sm text-gray-600 hover:text-gray-800 mt-2 transition-colors">
                    {{ __('View Full Cart') }}
                </a>
            </div>
        @else
            <!-- Empty Cart -->
            <div class="p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <p class="text-gray-500 font-medium mb-2">{{ __('Your cart is empty') }}</p>
                <p class="text-sm text-gray-400 mb-4">{{ __('Add products to get started') }}</p>
                <a href="{{ route('products') }}" 
                   wire:navigate
                   class="inline-block px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                    {{ __('Browse Products') }}
                </a>
            </div>
        @endif
    </div>
</div>