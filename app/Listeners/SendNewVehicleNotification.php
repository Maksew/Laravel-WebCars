<?php

namespace App\Listeners;

use App\Events\NewVehicleCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewVehicleAdded;
use Illuminate\Support\Facades\Log;


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
     *
     * @param  NewVehicleCreated  $event
     * @return void
     */
    public function handle(NewVehicleCreated $event): void
    {
        // Log to indicate that the listener is triggered
        Log::info('Écouteur SendNewVehicleNotification déclenché');

        $user = $event->vehicle->user;

        // Send the email
        Mail::to($user->email)->send(new NewVehicleAdded($event->vehicle));

        // Log to indicate that the email should be sent
        Log::info('E-mail envoyé à ' . $user->email);
    }
}
