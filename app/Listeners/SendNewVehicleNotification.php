<?php

namespace App\Listeners;

use App\Events\NewVehicleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewVehicleNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewVehicleCreated $event): void
    {
        //
    }
}
