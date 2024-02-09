<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductQuantity
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
     * @param  \App\Events\ProductPurchased  $event
     * @return void
     */
    public function handle(ProductPurchased $event)
    {
        $product = $event->product;
        $product->quantity -= 1;
        $product->update();
    }
}