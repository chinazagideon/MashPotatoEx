<?php

namespace App\Console;

use App\Console\Commands\PaymentVerify;
use App\Console\Commands\TraderBot;
use App\Console\Commands\UpdateMarket;
use App\Console\Commands\UpdateNews;
use App\Console\Commands\UpdateReturns;
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
        TraderBot::class,
        UpdateMarket::class,
        UpdateReturns::class,
        UpdateNews::class,
        PaymentVerify::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('update:market')
            ->everyFifteenMinutes();
        $schedule->command('update:rate')
                  ->everyThirtyMinutes();
        $schedule->command('update:news')
                  ->fridays();
        $schedule->command('update:returns')
            ->daily();
        $schedule->command('update:market')->everyFiveMinutes();
        $schedule->command('update:trader')->everyMinute();
//        $schedule->command('pay:verify')->everyThirtyMinutes();
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
