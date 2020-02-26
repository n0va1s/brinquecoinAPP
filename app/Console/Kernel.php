<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         'App\Console\Commands\SendCapsule',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('capsule:send')
            ->daily()
            ->sendOutputTo(storage_path('logs/capsulesend.log'))
            ->emailOutputTo('contato@brinquecoin.com');

        $schedule->command('auth:clear-resets')
            ->daily()
            ->sendOutputTo(storage_path('logs/authClearResets.log'))
            ->emailOutputTo('contato@brinquecoin.com')
            ->withoutOverlapping(10);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
