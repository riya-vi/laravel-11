<?php

namespace App\Jobs;

use App\Models\User ;
use Illuminate\Container\Attributes\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;



class CreateUserJob implements ShouldQueue
{
    use Queueable ,Dispatchable,InteractsWithQueue,SerializesModels ;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
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

        // Log::info('job ran ..') ;
        info("job ran ");
    }

    // public function failed(\Throwable $exception){
    //     Log::error('Failed to Process : {$exception->getMessage()}') ;
    // }
}
