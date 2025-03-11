<?php

namespace Darvis\ModulePhotoalbum;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Livewire\Livewire;
use Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumCreate;
use Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumList;
use Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumRead;
use Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumUpdate;
use Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumUpload;
use Illuminate\Support\Facades\File;

class PhotoalbumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register config
        $this->mergeConfigFrom(
            __DIR__ . '/../src/config/module_Photoalbum.php',
            'module_Photoalbum'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Register routes
        $this->loadRoutesFrom(__DIR__ . '/../src/routes/web.php');

        // Register views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'module-photoalbum');

        // Register Livewire components
        Livewire::component('photoalbum-create', PhotoalbumCreate::class);
        Livewire::component('photoalbum-list', PhotoalbumList::class);
        Livewire::component('photoalbum-read', PhotoalbumRead::class);
        Livewire::component('photoalbum-update', PhotoalbumUpdate::class);
        Livewire::component('photoalbum-upload', PhotoalbumUpload::class);

        // Publish config
        $this->publishes([
            __DIR__ . '/../src/config/module_Photoalbum.php' => App::basePath('config/module_Photoalbum.php'),
        ], 'module-photoalbum-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../src/resources/views' => App::basePath('resources/views/vendor/module-photoalbum'),
        ], 'module-photoalbum-views');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/../database/migrations/' => App::basePath('database/migrations'),
        ], 'module-photoalbum-migrations');
    }
}
