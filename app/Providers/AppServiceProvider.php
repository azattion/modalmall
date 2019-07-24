<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('numtoworder', function ($expression) {
            list($count, $str1, $str2, $str3) = explode(', ', $expression);
            return "<?php \$titles = ['$str1', '$str2', '$str3']; \$cases = array(2, 0, 1, 1, 1, 2); echo \$titles[($count % 100 > 4 && $count % 100 < 20) ? 2 : \$cases[min($count % 10, 5)]]; ?>";
        });
    }
}
