<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DbPing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dbping';

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
    $ok = \DB::selectOne('SELECT 1 as ok')->ok ?? null;

    \Log::info('SCHEDULER DB PING', [
        'ok' => $ok,
        'time' => now()->toDateTimeString(),
    ]);

    $this->info('DB ping logged');
    return self::SUCCESS;
}

}
