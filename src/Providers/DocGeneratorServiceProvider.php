<?php

namespace Railken\Amethyst\Providers;

use Illuminate\Support\ServiceProvider;
use Railken\Amethyst\Console\Commands\GenerateDocumentationCommand;
use Railken\Amethyst\Generator\DocumentGenerator;

class DocGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->commands([GenerateDocumentationCommand::class]);
        $this->app->singleton('amethyst.doc', DocumentGenerator::class);
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
