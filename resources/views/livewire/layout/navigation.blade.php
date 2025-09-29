<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ mobileMenuOpen: false, searchOpen: false }" class="bg-[#f5f1e8] border-b border-gray-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            <!-- Logo Section -->
            <div class="flex items-center space-x-8 rtl:space-x-reverse">
                <a href="{{ route('dashboard') }}" wire:navigate class="fl ex-shrink-0">
                    <x-application-logo class="h-10 w-auto" />
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center space-x-6 rtl:space-x-reverse">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" 
                        class="text-gray-700 hover:text-gray-900 font-medium transition-colors">
                        {{ __('Home') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')"
                        class="text-gray-700 hover:text-gray-900 font-medium transition-colors">
                        {{ __('Contact') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('our-story')" :active="request()->routeIs('our-story')"
                        class="text-gray-700 hover:text-gray-900 font-medium transition-colors">
                        {{ __('Our Story') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('categories')" :active="request()->routeIs('categories')"
                        class="text-gray-700 hover:text-gray-900 font-medium transition-colors">
                        {{ __('Categories') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                
                <!-- Search Bar - Desktop -->
                <div class="hidden md:block">
                    <livewire:header-search />
                </div>

                <!-- Mobile Search Toggle -->
                <div x-show="searchOpen" x-cloak class="md:hidden pb-4 absolute top-16 left-0 w-full px-4 bg-[#f5f1e8]">
                    <livewire:header-search />
                </div>

                <!-- Action Icons -->
                <div class="hidden sm:flex items-center space-x-3 rtl:space-x-reverse">
                    <!-- Wishlist Icon -->
                    <a href="{{ route('wishlist') }}" class="relative p-2 text-gray-700 hover:text-gray-900 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </a>

                    <!-- Compare Icon -->
                    <a href="{{ route('compare') }}" class="relative p-2 text-gray-700 hover:text-gray-900 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </a>

                    <!-- Cart Component -->
                    <livewire:header-cart />
                </div>

                <!-- User Dropdown -->
                @auth
                    <x-dropdown align="right" width="48" class="hidden sm:block">
                        <x-slot name="trigger">
                            <button class="flex items-center space-x-2 rtl:space-x-reverse px-3 py-2 text-gray-700 hover:text-gray-900 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                                    <span class="text-sm font-medium">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('orders')" wire:navigate>
                                {{ __('My Orders') }}
                            </x-dropdown-link>
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:block px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                        {{ __('Login') }}
                    </a>
                @endauth

                <!-- Mobile Search Button -->
                <button @click="searchOpen = !searchOpen" class="md:hidden p-2 text-gray-700 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-gray-700 hover:text-gray-900">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-cloak class="lg:hidden border-t border-gray-200 bg-white">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
                {{ __('Contact') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('our-story')" :active="request()->routeIs('our-story')" wire:navigate>
                {{ __('Our Story') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categories')" :active="request()->routeIs('categories')" wire:navigate>
                {{ __('Categories') }}
            </x-responsive-nav-link>
        </div>

        <!-- Mobile User Menu -->
        @auth
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="px-4 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('wishlist')" wire:navigate>
                        {{ __('Wishlist') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('orders')" wire:navigate>
                        {{ __('My Orders') }}
                    </x-responsive-nav-link>
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            </div>
        @else
            <div class="pt-4 pb-3 border-t border-gray-200 px-4">
                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md">
                    {{ __('Login') }}
                </a>
            </div>
        @endauth
    </div>
</nav>
