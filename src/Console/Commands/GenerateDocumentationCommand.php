<?php

namespace Railken\LaraOre\Console\Commands;

use Illuminate\Console\Command;

class GenerateDocumentationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ore:documentation:generate';

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
        $this->info('a');
    }
}
