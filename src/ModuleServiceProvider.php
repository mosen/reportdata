<?php
namespace Munkireport\ReportData;

use MR\Module\ServiceProvider;
use munkireport\lib\Modules as ModuleMgr;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadFactoriesFrom(__DIR__.'/../factories');
        $this->loadViewsFrom(__DIR__.'/../views', 'reportdata');
        $this->loadRoutesFrom(__DIR__.'/../web-routes.php');
        $this->loadRoutesFrom(__DIR__.'/../api-routes.php');
        $this->loadJsonTranslationsFrom(__DIR__.'/../locales');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/reportdata.php' => config_path('reportdata.php'),
            ], 'config');
        }

//        app('events')->listen(
//            \Nuwave\Lighthouse\Events\BuildSchemaString::class,
//            function(): string {
//                return file_get_contents(__DIR__ . '/../graphql/schema.graphql');
//            }
//        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
