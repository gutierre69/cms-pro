<?php

namespace App\Listeners;

use Log;
use App\Events\PostRead;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostReadListener
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
     * @param  \App\Events\PostRead  $event
     * @return void
     */
    public function handle(PostRead $event)
    {
        return $event->read();
    }
}
