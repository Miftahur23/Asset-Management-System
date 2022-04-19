<?php

namespace App\Listeners;

use App\Events\DepartmentEvent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DepartmentDelete
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\DepartmentEvent  $event
     * @return void
     */
    public function handle(DepartmentEvent $event)
    {
        if(Cache::has('Departments'))
            {
                Cache::forget('Departments');
            }
    }
}
