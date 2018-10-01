<?php

namespace Railken\Amethyst\Console\Commands;

use Illuminate\Console\Command;

class GenerateDocumentationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amethyst:documentation:generate {--d=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all documentations';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        app()->get('amethyst.doc')->generateAll(__DIR__.'/../../stubs', $this->option('d') ? $this->option('d') : getcwd().'/docs');
    }
}
