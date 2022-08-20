<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kartikey\AdminCrm\Models\announcementBar;
use Kartikey\AdminCrm\Models\Contact;
use Kartikey\AdminCrm\Models\Menu;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public $announcement;
    public $contact;
    public $menu;

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->announcement = announcementBar::get()->first();
        view()->composer('layouts.master', function($view) {
            $view->with(['announcement' => $this->announcement]);
        });

        $this->menu = Menu::all();
        view()->composer('layouts.master', function($view) {
            $view->with(['menu' => $this->menu]);
        });

        $this->contact = Contact::get()->first();
        view()->composer('layouts.footer', function($view) {
            $view->with(['contact' => $this->contact]);
        });
    }
}


?>