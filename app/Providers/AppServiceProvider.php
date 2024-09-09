<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
    public function boot(): void
    {
        //
       Blade::directive('menu', function ($position) {
        return "<?php echo app('\\App\\View\\Components\\MenuWidget', ['position' => $position])->render(); ?>";
    });
    }
}
