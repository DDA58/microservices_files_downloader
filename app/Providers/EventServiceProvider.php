<?php

namespace App\Providers;

use App\Events\FileDownloaded;
use App\Listeners\IncrementDownloadCounter;
use App\Listeners\AddLog;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        FileDownloaded::class => [
            AddLog::class,
            IncrementDownloadCounter::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }
}
