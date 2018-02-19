<?php

namespace App\Providers;

use App\Sport;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      \View::composer('*', function($view) {
        $sports = \Cache::rememberForever('sports', function() {
          return Sport::all();
        });

        $view->with('sports', $sports);
      });

      Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      if ($this->app->environment() == 'production') {
        URL::forceScheme('https');
      }
    }
}
