<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EmailUserActivateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:user:activate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send user activate Email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        var_dump('test');
    }
}
