<?php

namespace Amethyst\Documentation\Tests;

class GeneratorTest extends BaseTest
{
    public function testSomething()
    {
        $this->artisan('amethyst:documentation:generate', ['--d' => $this->getDirectory()]);
    }
}
