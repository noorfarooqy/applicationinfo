<?php
namespace Drongotech\Applicationinfo;

use Illuminate\Support\ServiceProvider;

class ApplicationinfoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRequired();
        $this->publishConfig();
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


    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations'),
        ], 'appinfo-migrations');
        $this->publishes([
            __DIR__ . '/../seeders' => database_path('seeders'),
        ], 'appinfo-seeders');

    }
}
