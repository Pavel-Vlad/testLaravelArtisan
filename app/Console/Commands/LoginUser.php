<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LoginUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:login {user} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get user token for Api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
