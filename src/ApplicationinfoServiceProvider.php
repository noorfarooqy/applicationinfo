<?php
namespace Drongotech\Applicationinfo;

use Illuminate\Support\ServiceProvider;

class ApplicationinfoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRequired();
        $this->publishConfig();
        $this->publishAssets();
        $this->publishMigrations();

    }

    public function boot()
    {

    }

    protected function loadRequired()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'appinfo');

    }
    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/appinfo.php' => config_path('appinfo.php'),
        ], 'appinfo-config');
    }
    protected function publishViews()
    {
        $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/appinfo')], 'appinfo-views');
    }

    protected function publishAssets()
    {
        $this->publishes([
            __DIR__ . '/../public/build' => public_path('build'),
        ], 'appinfo-build');
        $this->publishes([
            __DIR__ . '/../public/assets' => public_path('appinfo/assets'),
        ], 'appinfo-assets');

    }

    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations'),
        ], 'appinfo-migrations');

    }
}
