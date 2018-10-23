<?php

namespace Railken\Amethyst\Tests;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class GeneratorTest extends BaseTest
{
    public function testSomething()
    {
        $dir = getcwd().'/var/cache/docs';

        if (file_exists($dir)) {
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ($files as $fileinfo) {
                $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
                $todo($fileinfo->getRealPath());
            }

            rmdir($dir);
        }

        $this->artisan('amethyst:documentation:generate', ['--d' => $dir]);
    }
}
