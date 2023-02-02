<?php

namespace App\Console\Commands;

use App\Parseables\Parseable;
use Illuminate\Console\Command;

class Parse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse {target}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse and save data from external api to DB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $target = $this->getParseable();
        return $this->info($target->parse());
    }

    protected function getParseable(): Parseable
    {
        $name = $this->argument('target');
        $className = '\App\Parseables\\' . $name . '\\' . $name;

        return new $className();
    }
}
