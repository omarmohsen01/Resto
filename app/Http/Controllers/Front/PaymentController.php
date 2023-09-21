<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Error;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Stripe\StripeClient;


class PaymentController extends Controller
{
    public function stripeCheckout(Order $order)
    {
        // dd($order);
        $amount=$order->items->sum(function($item){
            return $item->price * $item->quantity;
        });
        $unitAmount = max($amount, 50);
        $stripe = new StripeClient(config('services.stripe.secret_key'));

        $redirectUrl = route('stripe.checkout.success',$order->id).'?session_id={CHECKOUT_SESSION_ID}';

        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,

            'customer_email' => $order->user->email,

            'payment_method_types' => ['link','card'],

            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $order->user->name,
                        ],
                        'unit_amount' => 100*$order->total,
                        'currency' => 'USD',
                    ],
                    'quantity' => 1
                ],
            ],

            'mode' => 'payment',
            'allow_promotion_codes' => true,
        ]);

        return redirect($response['url']);
  
    }

    public function stripeCheckoutSuccess(Request $request,Order $order)
    {
        $stripe = new StripeClient(config('services.stripe.secret_key'));

        $response = $stripe->checkout->sessions->retrieve($request->session_id);
        //dd($response);
        
        if($response->status=='complete'){
            try{
                $payment=new Payment();
                $payment->forceFill([
                    'order_id'=>$order->id,
                    'amount'=>$response->amount_subtotal / 100,
                    'currency'=>$response->currency,
                    'status'=>'completed',
                    'method'=>'stripe',
                    'transaction_id'=>$response->id,
                    'transaction_data'=>json_encode($response)
                ])->save();
            }catch(QueryException $e){
                echo $e->getMessage();
            }
        }
        return redirect()->route('checkout')
                            ->with('success','Payment successful.');
    }

    
}