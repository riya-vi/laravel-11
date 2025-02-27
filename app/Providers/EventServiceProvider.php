<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;
use App\Listeners\UpdateActiveStatus;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Login::class => [
            UpdateACtiveStatus::class,
        ],
        Logout::class => [
            UpdateActiveStatus::class,
        ],
    ];
}


// namespace App\Providers;

// use App\Events\UserLoggedIn;
// use App\Events\UserLoggedOut;
// use App\Listeners\UpdateActiveStatus;
// use Illuminate\Auth\Events\Login;
// use Illuminate\Auth\Events\Logout;
// use Illuminate\Support\Facades\Event;
// use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

// class EventServiceProvider extends ServiceProvider
// {
//     protected $listen = [
//         UserLoggedIn::class => [
//             UpdateActiveStatus::class,
//         ],
//         UserLoggedOut::class => [
//             UpdateActiveStatus::class,
//         ],
//     ];
// }