<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Wishlist; // Adjust according to your Wishlist model path

class WishlistServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('wishlistCount', Wishlist::where('user_id', auth()->id())->count());
        });
    }

    public function register()
    {
        //
    }
}
