<?php
namespace PersonalityRequire;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('medusa.membership_approve')) {
            $this->app->make('Illuminate\Contracts\Http\Kernel')->pushMiddleware('Personality\Http\Middleware\CheckIfActive');
        }
    }
}
