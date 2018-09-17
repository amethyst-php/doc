<?php

namespace Railken\LaraOre\Tests;

class GeneratorTest extends BaseTest
{
    public function testSomething()
    {
        $this->artisan('ore:documentation:generate', ['--d' => getcwd().'/var/cache/docs']);
    }
}
