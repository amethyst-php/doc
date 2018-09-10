<?php

namespace Railken\LaraOre;

use Illuminate\Support\ServiceProvider;
use Railken\LaraOre\Console\Commands\GenerateDocumentationCommand;

class DocumentationGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->commands([GenerateDocumentationCommand::class]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
    }
}
