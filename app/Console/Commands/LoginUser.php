<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

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
        $name = $this->argument('user');
        $password = $this->argument('password');
        if (auth()->attempt(['name' => $name, 'password' => $password])) {
            $token = auth()->user()->createToken($name . '_token')->plainTextToken;
            $token = str($token)->explode('|')->get(1); // get only token from string with token
            $this->info('Ваш токен: ' . $token);
            return $this::SUCCESS;
        } else {
            $this->error('Пользователь не найден!');
            return $this::FAILURE;
        }
    }
}
