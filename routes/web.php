<?php

use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FoodController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\MenuController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;


Route::get('/',[HomeController::class,'index'])->name('home');

Route::resource('/booking',BookingController::class)->name('index','booking');
Route::get('/mybooking',[BookingController::class,'myBooking'])
    ->name('mybooking')
    ->middleware('auth');

Route::get('/menu',[MenuController::class,'index'])->name('menu');

Route::get('/food/show/{food:slug}',[FoodController::class,'show'])->name('show.food');

Route::resource('cart', CartController::class);

Route::get('checkout',[CheckoutController::class,'create'])->name('checkout');
Route::post('checkout',[CheckoutController::class,'store'])->name('checkout');


Route::controller(PaymentController::class)->group(function(){
    Route::get('order/{order}/pay','create')->name('order.payment.create');
    Route::get('orders/{order}/stripe/payment-intent','stripeCheckout')->name('stripe.checkout');
    Route::get('orders/{order}/stripe/payment-intent/success','stripeCheckoutSuccess')->name('stripe.checkout.success');
});
    
require __DIR__.'/dashboard.php';