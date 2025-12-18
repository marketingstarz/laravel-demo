<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Heartbeat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'heartbeat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
     public function handle(): int
     {
       \Log::info('SCHEDULER HEARTBEAT ran', [
         'time' => now()->toDateTimeString(),
         'user' => get_current_user(),
       ]);

       $this->info('Heartbeat logged');
       return self::SUCCESS;
      }
}
