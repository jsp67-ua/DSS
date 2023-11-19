<?php

namespace App\Listeners;

use App\Events\CartLineAdded;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCartLineTotal
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
     * @param  \App\Events\CartLineAdded  $event
     * @return void
     */
    public function handle(CartLineAdded $event)
    {
        $cartLine = $event->cartLine;
        $cartLine->updateTotal();
    }
}
