<?php

namespace Railken\LaraOre\Tests\App;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Railken\LaraOre\Api\Support\Router;
use Railken\LaraOre\Tests\App\Address\AddressFaker;
use Railken\LaraOre\Tests\App\Address\AddressManager;

class AddressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ore.address.php' => config_path('ore.address.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutes();
        $this->loadDocumentation();

        config(['ore.managers' => array_merge(Config::get('ore.managers', []), [
            \Railken\LaraOre\Tests\App\Address\AddressManager::class,
        ])]);
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
        $this->app->register(\Railken\LaraOre\ApiServiceProvider::class);

        $this->mergeConfigFrom(__DIR__.'/../config/ore.address.php', 'ore.address');
    }

    /**
     * Load routes.
     */
    public function loadRoutes()
    {
        $config = Config::get('ore.address.http.admin');

        if (Arr::get($config, 'enabled')) {
            Router::group('admin', Arr::get($config, 'router'), function ($router) use ($config) {
                $controller = Arr::get($config, 'controller');

                $router->get('/', ['uses' => $controller.'@index']);
                $router->post('/', ['uses' => $controller.'@create']);
                $router->put('/{id}', ['uses' => $controller.'@update']);
                $router->delete('/{id}', ['uses' => $controller.'@remove']);
                $router->get('/{id}', ['uses' => $controller.'@show']);
            });
        }
    }

    public function loadDocumentation()
    {
        $this->app->get('ore.doc')
            ->manager('railken-lara-ore-address', AddressManager::class, AddressFaker::class);
    }
}
