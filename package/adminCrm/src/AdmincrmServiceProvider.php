<?php

namespace Kartikey\AdminCrm;
use Illuminate\Support\ServiceProvider;

class AdmincrmServiceProvider extends ServiceProvider 
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','AdminCrm');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');

        $this->publishes([
            __DIR__ . '/../publishable/assets' => public_path('/assets/'),
        ], 'public');
    }

    public function register()
    {

    }
}