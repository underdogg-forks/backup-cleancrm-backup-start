<?php namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class InstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'Modules\Core';

    protected $moduleAlias = 'core';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    private function booted()
    {
        //Resolve your module dependency

        $this->createSchema();
    }

    private function createSchema()
    {
        \Artisan::call('module:migrate', ['alias' => $this->moduleAlias]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
