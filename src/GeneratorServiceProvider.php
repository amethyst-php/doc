<?php

namespace Railken\Amethyst\Documentation;

use Illuminate\Support\ServiceProvider;
use Railken\Amethyst\Documentation\Console\Commands\GenerateCommand;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->commands([GenerateCommand::class]);
        $this->app->singleton('amethyst.documentation', Generator::class);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(\Railken\Lem\Providers\ManagerServiceProvider::class);
        $this->app->register(\Railken\Amethyst\Providers\ApiServiceProvider::class);
    }
}
