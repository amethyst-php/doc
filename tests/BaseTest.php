<?php

namespace Railken\LaraOre\Tests;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/..', '.env');
        $dotenv->load();

        parent::setUp();

        $this->artisan('migrate:fresh');
    }

    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\DocumentationGeneratorServiceProvider::class,
            \Railken\LaraOre\Tests\App\AddressServiceProvider::class,
        ];
    }
}
