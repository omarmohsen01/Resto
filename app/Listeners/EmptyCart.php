<?php

namespace App\Listeners;

use App\Http\Controllers\Interfaces\Front\CartServiceInterface;
use App\Models\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmptyCart
{
    public $cart;
    /**
     * Create the event listener.
     */
    public function __construct(CartServiceInterface $cart)
    {
        $this->cart=$cart;
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        $this->cart->empty();
    }
}
