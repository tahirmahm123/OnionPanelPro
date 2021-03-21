<?php

namespace App\Listener;

use App\Event\VPNCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VPNCreatedListenter
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
     * @param  VPNCreatedEvent  $event
     * @return void
     */
    public function handle(VPNCreatedEvent $event)
    {
        //
    }
}
