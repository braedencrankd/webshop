<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Artisan::command('app:abandoned-cart', function () {
//     $this->comment('Abandoned cart command');
// })->purpose('Command description')->dailyAt('13:00');
