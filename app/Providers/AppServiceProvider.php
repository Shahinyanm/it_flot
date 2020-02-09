<?php

namespace App\Providers;

use ExportLocalization;
use Illuminate\Support\ServiceProvider;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'app',
            function ($view) {
                return $view->with(
                    [
                        'messages' => ExportLocalization::export()->toArray(),
                    ]
                );
            }
        );
    }
}
