<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Support\ServiceProvider;
use App\Observers\AdminLogObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Cart::observe(AdminLogObserver::class);
        Category::observe(AdminLogObserver::class);
        CartItem::observe(AdminLogObserver::class);
        Coupon::observe(AdminLogObserver::class);
    }
}
