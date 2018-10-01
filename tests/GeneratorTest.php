<?php

namespace Railken\Amethyst\Tests;

class GeneratorTest extends BaseTest
{
    public function testSomething()
    {
        new \Railken\Amethyst\Tests\App\Managers\AddressManager();

        $this->artisan('amethyst:documentation:generate', ['--d' => getcwd().'/var/cache/docs']);
    }
}
