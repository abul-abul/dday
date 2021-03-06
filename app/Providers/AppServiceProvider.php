<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\ArticleInterface',
            'App\Services\ArticleService'
        );
        $this->app->bind(
            'App\Contracts\UserInterface',
            'App\Services\UserService'
        );
        $this->app->bind(
            'App\Contracts\YoutubeInerface',
            'App\Services\YoutubeService'
        );
        $this->app->bind(
            'App\Contracts\GalleryInterface',
            'App\Services\GalleryService'
        );
        $this->app->bind(
            'App\Contracts\PageInterface',
            'App\Services\PageService'
        );
        $this->app->bind(
            'App\Contracts\SubMenuInterface',
            'App\Services\SubMenuService'
        );
        $this->app->bind(
            'App\Contracts\LanguageInterface',
            'App\Services\LanguageService'
        );
    }
}
