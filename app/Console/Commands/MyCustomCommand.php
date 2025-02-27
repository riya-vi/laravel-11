<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User ;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Action ;

class MyCustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify {user_id} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send a notification to a specific user, with an optional force flag ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('user_id') ;
        $force = $this->option('force') ;

        $user = User::find($userId); 

        if (!$user) {                        
            $this->error('User not found!'); 
            return Command::FAILURE;        
        }

        if (!$force && !$this->confirm('Do you really want to notify this user?')) {
            $this->info('Command cancelled.');
            return Command::SUCCESS;      
        }

        // Notification::send($user, new CustomNotification());

        $this->info('Notification sent successfully!');   

        return Command::SUCCESS; 
    }
}
