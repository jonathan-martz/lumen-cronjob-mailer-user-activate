<?php

namespace App\Console\Commands;

use App\Mail\RegisterUser;
use App\Model\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

/**
 * Class EmailUserActivateCommand
 * @package App\Console\Commands
 */
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

    /**
     *
     */
    public function handle()
    {
        $users = DB::table('users')->where('active', '=', '0');

        if($users->count() !== 0) {
            foreach($users->get() as $key => $user) {
                $user = new User((array)$user);

                $tokens = DB::table('user_activate_token')
                    ->where('userid', '=', $user->getAuthIdentifier());

                if($tokens->count() === 0) {
                    $token = bin2hex(openssl_random_pseudo_bytes(256));
                    DB::table('user_activate_token')->insert(
                        [
                            'userid' => $user->getAuthIdentifier(),
                            'token' => $token,
                            'date' => strtotime('now')
                        ]
                    );
                    Mail::to($user->getAttribute('email'))
                        ->send(new RegisterUser($user->getAttribute('email'), $token, $user->getAttribute('email')));
                }
            }
        }
    }
}
