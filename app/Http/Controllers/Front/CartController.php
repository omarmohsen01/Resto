<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Front\CartServiceInterface;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{

    protected $cartService;
    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService=$cartService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $total = $this->cartService->total();        
        return view('front.cart',['cart'=>$this->cartService,'total'=>$total]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_id'=>['required','int','exists:foods,id'],
            'quantity'=>['nullable','int','min:1'],
        ]);
        $selectedSize=$request->post('size');
        
        $food=Food::findOrFail($request->post('food_id'));
        
        $this->cartService->add($food,$request->post('quantity'),$selectedSize);
        
        $total = $this->cartService->total();
        
        return view('front.cart',['cart'=>$this->cartService,'total'=>$total]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'food_id'=>['required','int','exists:food,id'],
            'quantity'=>['nullable','int','min:1']
        ]);
        $food=Food::findOrFail($request->post('food_id'));
        $this->cartService->update($food,$request->post('quantity'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->cartService->delete($id);
        $total = $this->cartService->total();
        return view('front.cart',['total'=>$total,'cart'=>$this->cartService]);
    }
}