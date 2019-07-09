<?php

namespace Amethyst\Documentation\Tests;

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

        $dir = $this->getDirectory();

        if (file_exists($dir)) {
            $di = new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS);
            $ri = new \RecursiveIteratorIterator($di, \RecursiveIteratorIterator::CHILD_FIRST);
            foreach ($ri as $file) {
                $file->isDir() ? rmdir($file) : unlink($file);
            }
            rmdir($dir);
        }

        mkdir($dir, 0777, true);
    }

    public function getDirectory()
    {
        return __DIR__.'/../var';
    }

    protected function getPackageProviders($app)
    {
        return [
            \Amethyst\Documentation\GeneratorServiceProvider::class,
            \Amethyst\Providers\FooServiceProvider::class,
        ];
    }
}
