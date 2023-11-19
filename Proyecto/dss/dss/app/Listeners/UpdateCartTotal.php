<?php

namespace App\Listeners;

use App\Events\CartAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCartTotal
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
     * @param  \App\Events\CartAdded  $event
     * @return void
     */
    public function handle(CartAdded $event)
    {
        $cart = $event->cart;
        $cart->updateTotal();
    }
}
