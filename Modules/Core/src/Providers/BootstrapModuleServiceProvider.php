<?php namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapModuleServiceProvider extends ServiceProvider
{
    protected $module = 'Modules\Core';

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
        /**
         * Register dynamic menu or what you want when
         * bootstrap your module
         */
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
