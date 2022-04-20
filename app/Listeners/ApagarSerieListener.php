<?php

namespace App\Listeners;

use App\Events\ApagarSerieEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApagarSerieListener implements ShouldQueue
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
     * @param  ApagarSerieEvent  $event
     * @return void
     */
    public function handle(ApagarSerieEvent $event)
    {
        $serie = $event->serie;

        if ($serie->capa) {
            Storage::delete($serie->capa);
        }
    }
}
