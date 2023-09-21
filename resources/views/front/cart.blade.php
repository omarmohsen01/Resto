@extends('layouts.front')
@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
  <!-- Shopping Cart -->
   <div class=" section">
    <div class="container text-primary">
        <div class="cart-list-head">
            <!-- Cart List Title -->
            <div class="cart-list-title">
                <div class="row text-primary" style="font-size: 34px">
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Food Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Subtotal</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Discount</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>
            <hr>
            <!-- End Cart List Title -->
            @foreach ($cart->get() as $item)
                <!-- Cart Single List list -->
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-3 col-12">
                            <h6 class="product-name"><a href="{{ route('show.food',$item->food->slug) }}">
                                    {{ $item->food->name }}</a></h6>
                            <p class="product-des">
                                <span><em>size:</em> {{ $item->options }} </span>
                                <span><em>price:</em> {{ $item->food->{$item->options} }} </span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">
                                <input type="number" class="form-control" value="{{ $item->quantity }}" >
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>${{ $item->quantity * $item->food->{$item->options} }}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>$0</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <form method="POST" action="{{ route('cart.destroy',$item->id) }}">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="selectedSize" value="{{ $item->options }}">
                                <button type="submit" class="btn btn-link p-0">
                                    <i class="fa fa-trash me-3"></i>
                                </button>
                            </form>
                            {{-- <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a> --}}
                        </div>
                    </div>
                </div>
                <hr>
                <!-- End Single List list -->
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="column">
                        <div class="col-lg-4 col-md-6 col-12" style="margin-top: 40px;">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>${{ $total  }}</span></li>
                                    <li>Shipping<span>Free</span></li>
                                    <li>You Save<span>$29.00</span></li>
                                    <li class="last">You Pay<span>${{ $total }}</span></li>
                                </ul>
                                    <div class="row">
                                        <div class="col-6">
                                    <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a></div><div class="col-6">
                                    <a href="{{ route('menu') }}" class="btn btn-primary">Continue shopping</a></div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn btn-primary">Apply Coupon</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
   </div>
<!--/ End Shopping Cart -->
        </div>
    </div>
</div>
@endsection
