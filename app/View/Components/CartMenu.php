<?php

namespace App\View\Components;

use App\Http\Controllers\Interfaces\Front\CartServiceInterface;
use App\Http\Controllers\Services\Front\CartService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartMenu extends Component
{
    public $items;
    public $total;

    /**
     * Create a new component instance.
     */
    public function __construct(CartServiceInterface $cartService)
    {
        $this->items=$cartService->get();
        $this->total=$cartService->total();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-menu');
    }
}