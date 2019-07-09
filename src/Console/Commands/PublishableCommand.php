<?php

namespace Amethyst\Documentation\Console\Commands;

use Illuminate\Console\Command;

class PublishableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amethyst:documentation:publishable {--s=} {--d=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transform markdown documentation to a more stylish form';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        app()->get('amethyst.documentation')->publishable(
            $this->option('s') ? $this->option('s') : getcwd().'/resources/docs',
            $this->option('d') ? $this->option('d') : getcwd().'/docs'
        );
    }
}
