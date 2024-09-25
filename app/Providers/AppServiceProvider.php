<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('menu', function ($expression) {
            // Parse the expression into components, and fill missing values with defaults
            $params = explode(',', $expression);

            // Set default values if not provided
            $title = isset($params[0]) ? trim($params[0], "'\" ") : '';
            $ulClass = isset($params[1]) ? trim($params[1], "'\" ") : '';
            $liClass = isset($params[2]) ? trim($params[2], "'\" ") : '';
            $aClass = isset($params[3]) ? trim($params[3], "'\" ") : '';
            $single = isset($params[4]) ? trim($params[4], "'\" ") : 'false';

            // Convert 'true'/'false' strings to boolean values
            $isSingle = filter_var($single, FILTER_VALIDATE_BOOLEAN);

            // Generate PHP code to handle the directive
            return "<?php
                \$menus = App\Models\Menu::where('position', '{$title}')->get();

                if (" . var_export($isSingle, true) . " && \$menus->count() > 0) {
                    echo '<a href=\"' . \$menus[0]->url . '\" class=\"{$aClass}\">' . \$menus[0]->name . '</a>';
                } else {
                    echo '<ul class=\"{$ulClass}\">';
                    foreach (\$menus as \$menu) {
                        echo '<li class=\"{$liClass}\"><a href=\"' . \$menu->url . '\" class=\"{$aClass}\">' . \$menu->name . '</a></li>';
                    }
                    echo '</ul>';
                }
            ?>";
        });


        // Sharing wishlist count with all views
        View::share('wishlistCount', function () {
            return Wishlist::where('user_id', auth()->id())->count();
        });


    }
}
