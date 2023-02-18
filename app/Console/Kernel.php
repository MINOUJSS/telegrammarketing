<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Goutte\Client;
use App\Jobs\ScrapingSaouraDelivery;
use App\Jobs\TelegramBots\SaouraDeliveryMarketer;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //everyMinute()
        //hourly()
        //everyThirtyMinutes()
        //everyFiveMinutes()
        //twiceDaily(9, 17)
        //scraping saoura delivery and post
        if(scraper_is_active())
        {
            $schedule->call(function(){
                ScrapingSaouraDelivery::dispatch();        
             })->hourly()->runInBackground();
        }       
        //marketing saouradelivery every hour
        if(auto_markter_is_active())
        {
            $schedule->call(function(){
                SaouraDeliveryMarketer::dispatch();
            })->hourly()->runInBackground();
        }        
        //------------
       // $schedule->command('inspire')->hourly();
        $schedule->command('queue:work')->hourly();
        $schedule->command('queue:restart')->everyFiveMinutes();
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
