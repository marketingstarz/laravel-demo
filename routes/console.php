<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;

app()->afterResolving(Schedule::class, function (Schedule $schedule) {
    $schedule->command('heartbeat')
        ->everyThirtyMinutes()
        ->withoutOverlapping();
    $schedule->command('dbping')
         ->everyThirtyMinutes()
         ->withoutOverlapping();
});
