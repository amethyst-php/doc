<?php

namespace Railken\Amethyst\Documentation\Console\Commands;

use Illuminate\Console\Command;

class GenerateCommand extends Command
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
        app()->get('amethyst.documentation')->generate($this->option('d') ? $this->option('d') : getcwd().'/docs');
    }
}
