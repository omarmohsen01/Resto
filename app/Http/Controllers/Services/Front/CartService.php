<?php 

namespace App\Http\Controllers\Services\Front;

use App\Http\Controllers\Interfaces\Front\CartServiceInterface;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CartService implements CartServiceInterface
{
    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }

    public function get(): Collection
    {
        if(!$this->items->count()) {
            $this->items = Cart::with('food')->where('user_id',Auth::id())->get();
        }
        return $this->items;
    }

    public function add(Food $food, $quantity = 1, $size)
    {
        $sameFood = Cart::where('food_id', '=', $food->id)->first();
        $notSameSize = Cart::where('options', '!=', $size)->first();
        $sameFood_sameSize = Cart::where('food_id', '=', $food->id)->where('options', '=', $size)->first();
        if(!$sameFood) {
            return Cart::create([
                'user_id' => Auth::id(),
                'food_id' => $food->id,
                'quantity' => $quantity,
                'options' => $size
            ]);
        } elseif($notSameSize && $sameFood) {
            return Cart::create([
                'user_id' => Auth::id(),
                'food_id' => $food->id,
                'quantity' => $quantity,
                'options' => $size
            ]);
        }
        return $sameFood_sameSize->increment('quantity', $quantity);

    }

    public function update($id, $quantity = 1)
    {
        Cart::where('id', '=', $id)
            ->update([
                'quantity' => $quantity
            ]);
    }

    public function delete($id)
    {
        Cart::where('id', '=', $id)
            ->delete();
    }

    public function empty()
    {
        Cart::where('cookie_id', '=', Cart::getCookieID())->delete();
    }

    public function total()
    {
        $total = 0;
        $items = Cart::where('cookie_id', '=', Cart::getCookieID())->with('food')->get();
        foreach($items as $item) {
            $subtotal = $item->quantity * $item->food->{$item->options};
            $total += $subtotal;
        }
        return $total;
    }

}