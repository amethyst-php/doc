<?php

namespace Amethyst\Documentation;

use Illuminate\Support\ServiceProvider;
use Amethyst\Documentation\Console\Commands\GenerateCommand;
use Amethyst\Documentation\Console\Commands\PublishableCommand;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->commands([GenerateCommand::class, PublishableCommand::class]);
        $this->app->singleton('amethyst.documentation', Generator::class);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(\Railken\Lem\Providers\ManagerServiceProvider::class);
        $this->app->register(\Amethyst\Providers\ApiServiceProvider::class);
    }
}
