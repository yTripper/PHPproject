<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

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
        Blade::directive('active', function($route){
            return "<?php echo request()->is($route) ? 'active' : null;?>";
        });
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
