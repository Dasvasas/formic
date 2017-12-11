<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Gpio;

use InfluxDB;

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

                $cmd = $gpio->cmd;
                $cmd = str_replace("{pin}", $gpio->pin, $cmd);

                $out = exec($cmd);
                
                if(preg_match("'^Temp=([0-9\.]+),Humidity=([0-9\.]+)'", $out, $result))
                {
                    $points = array(
                        new InfluxDB\Point(
                            'test_metric2',
                            null,
                            ['gpio' => $gpio->name],
                            ['temp' => (int) $result[1], 'humidity' => (int) $result[2]],
                            time()
                        ),
                    );

                    InfluxDB::writePoints($points, \InfluxDB\Database::PRECISION_SECONDS);
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
