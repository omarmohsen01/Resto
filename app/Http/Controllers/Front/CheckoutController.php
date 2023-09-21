<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Front\CartServiceInterface;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Intl\Countries;
use Throwable;

class CheckoutController extends Controller
{
    protected $cartService;
    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService=$cartService;
    }

    public function create()
    {
        if($this->cartService->get()->count()==0){
            return redirect()->route('home');
        }
        return view('front.checkout',
        ['cart'=>$this->cartService,'countries'=>Countries::getNames()]);
    }

    public function store(Request $request)
    {
        $request->validate([]);
        $items=$this->cartService->get();
        DB::beginTransaction();
        try{
            $order=Order::create([
                'user_id'=>Auth::id(),
                'payment_method'=>'cod',
                'shipping'=>$request->total,
                'total'=>$request->total
            ]);
            foreach($items as $item){
                OrderItem::create([
                    'order_id'=>$order->id,
                    'food_id'=>$item->food_id,
                    'food_name'=>$item->food->name,
                    'price'=>$item->food->{$item->options},
                    'quantity'=>$item->quantity
                ]);
                foreach($request->post('addr') as $type=>$address) {
                    $address['type']=$type;
                    $order->addresses()->create($address);
                }
            }
            DB::commit();
            event('order.created');


        }catch(Throwable $e){
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('stripe.checkout',$order->id);
    }
}
