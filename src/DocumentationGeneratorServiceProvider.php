<?php

namespace Railken\LaraOre;

use Illuminate\Support\ServiceProvider;
use Railken\LaraOre\Console\Commands\GenerateDocumentationCommand;
use Railken\LaraOre\Generator\DocumentGenerator;

class DocumentationGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->commands([GenerateDocumentationCommand::class]);
        $this->app->singleton('ore.doc', DocumentGenerator::class);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
    }
}
