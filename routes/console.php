<?php

use App\Console\Commands\UserCreateCommand;
use App\Jobs\CreateUserJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('user:create')->everyMinute();

// Schedule::call(function( Schedule $schedule) {
//        $schedule->command('user:create') ;
// })->everyMinute() ;

//  function schedule(Schedule $schedule) 

// {
//     $schedule->command('UserCreateCommand')->everyMinute(); // Example: runs every minute
// }


// function schedule(Schedule $schedule) {
//     $schedule->call(function (){
//        $this->dispatch(new CreateUserJob) ;
//     })->everyMinute() ;
// }


// function schedule(Schedule $schedule){
//     $schedule->job(new CreateUserJob)->everyMinute() ; 
//     return 'job dispatched' ;
// }


Schedule::job(new CreateUserJob)->everyMinute() ;