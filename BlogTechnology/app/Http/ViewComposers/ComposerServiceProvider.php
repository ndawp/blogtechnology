<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
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
        View::composer(
            'user.layouts.sidebar', 'App\Http\ViewComposers\SidebarComposer'
        );
        View::composer(
            'user.layouts.slide', 'App\Http\ViewComposers\SlideComposer'
        );
    }
}
