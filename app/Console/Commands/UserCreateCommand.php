<?php

namespace App\Console\Commands;

use App\Jobs\CreateUserJob;
use Illuminate\Console\Command;
use App\Models\User ;
use Illuminate\Contracts\Bus\Dispatcher;

class UserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a user every 1 minute .';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info("Cron Job running at ". now());

        $totalUsers = User::count() ;

        $name = 'User'.($totalUsers + 1) ;
        $email = 'User'.($totalUsers + 1).'@gmail.com' ;
        $password = 'password' ;

        User::create([
            'name' => $name ,
            'email'=>  $email ,
            'password' => $password
        ]) ;
        
        $this->info('user created !') ;

        // return app(Dispatcher::class)->dispatch(new CreateUserJob()) ;


    }
}
