<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Gpio;

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

        $schedule->call(function () {
           
            $gpios = Gpio::where('type', 'Out')->get();
            
            foreach ($gpios as $gpio) {
                
                echo "\n";
                echo $gpio->cmd;
                $out = exec("$gpio->cmd");
                echo "\n";
                if(preg_match("'^Temp=([0-9\.]+),Humidity=([0-9\.]+)'", $out,$result))
                {
                        echo "$result[1] $result[2]";
                }
                
            }
            
        })->everyMinute();        
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
