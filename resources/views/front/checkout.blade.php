@extends('layouts.front')
@section('content')

<div class="container-xxl py-5 bg-dark hero-header mb-5 text-primary">
    <div class="container my-5 py-5">
        <section class="checkout-wrapper section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <input type="hidden" value="{{ $cart->total() }}" name="total"/>
                            <div class="checkout-steps-form-style-1">
                                <ul id="accordionExample">
                                    <li>
                                        <h5 class="text-primary title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h5>
                                        <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>User Name</label>
                                                        <div class="row">
                                                            <div class="col-md-6 form-input form">
                                                                <x-forms.input name="addr[billing][first_name]" placeholder="First Name"/>
                                                            </div>
                                                            <div class="col-md-6 form-input form">
                                                                <x-forms.input name="addr[billing][last_name]" placeholder="Last Name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Email Address</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[billing][email]" placeholder="Email Address" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Phone Number</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[billing][phone_number]" placeholder="Phone Number" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>Mailing Address</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[billing][street_address]" placeholder="Mailing Address" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>City</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[billing][city]" placeholder="City" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Post Code</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[billing][postal_code]" placeholder="Post Code" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Region/State</label>
                                                        <div class="select-items">
                                                            <x-forms.input name="addr[billing][state]" placeholder="State" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Country</label>
                                                        <div class="form-input form">
                                                            <select name="addr[billing][country]" class="form-control  @error('{{ $countries }}')
                                                                        is-invalid @enderror">
                                                                @foreach ($countries as $value=>$text)
                                                                    <option value="{{ $value }}">{{ $text }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="single-checkbox checkbox-style-3">
                                                        <input type="checkbox" id="checkbox-3">
                                                        <label for="checkbox-3"><span></span></label>
                                                        <p>My delivery and mailing addresses are the same.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    {{-- <div class="single-form button">
                                                        <button class="btn" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseFour" aria-expanded="false"
                                                            aria-controls="collapseFour">next
                                                            step</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </section>
                                        <h6 class="text-primary text-center">countinue Shipping Address</h6>
                                    </li>
                                    <hr>
                                    <li>
                                        <h5 class="text-primary title collapsed" >Shipping Address</h5>
                                        <section >
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>User Name</label>
                                                        <div class="row">
                                                            <div class="col-md-6 form-input form">
                                                                <x-forms.input name="addr[shipping][first_name]" placeholder="First Name"/>
                                                            </div>
                                                            <div class="col-md-6 form-input form">
                                                                <x-forms.input name="addr[shipping][last_name]" placeholder="Last Name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Email Address</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[shipping][email]" placeholder="Email Address" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Phone Number</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[shipping][phone_number]" placeholder="Phone Number" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-form form-default">
                                                        <label>Mailing Address</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[shipping][street_address]" placeholder="Mailing Address" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>City</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[shipping][city]" placeholder="City" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Post Code</label>
                                                        <div class="form-input form">
                                                            <x-forms.input name="addr[shipping][postal_code]" placeholder="Post Code" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Region/State</label>
                                                        <div class="select-items">
                                                            <x-forms.input name="addr[shipping][state]" placeholder="State" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Country</label>
                                                        <div class="form-input form">
                                                            <select name="addr[shipping][country]" class="form-control  @error('{{ $countries }}')
                                                                        is-invalid @enderror">
                                                                    @foreach ($countries as $value=>$text)
                                                                        <option value="{{ $value }}" >
                                                                                {{ $text }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-12">
                                                    <div class="checkout-payment-option">
                                                        <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                                                            Option</h6>
                                                        <div class="payment-option-wrapper">
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" checked id="shipping-1">
                                                                <label for="shipping-1">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                        alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-2">
                                                                <label for="shipping-2">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                        alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-3">
                                                                <label for="shipping-3">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                        alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-4">
                                                                <label for="shipping-4">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                        alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-12" style="margin-left: 22px;
                                                margin-top: 41px;">
                                                    <div class="steps-form-btn button">
                                                        <button class="btn btn-danger" >previous</button>
                                                        <button type="submit" class="btn btn-primary">pay now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </li>
                                    {{-- <li>
                                        <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                            aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                        <section class="checkout-steps-form-content collapse" id="collapsefive"
                                            aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="checkout-payment-form">
                                                        <div class="single-form form-default">
                                                            <label>Cardholder Name</label>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="Cardholder Name">
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default">
                                                            <label>Card Number</label>
                                                            <div class="form-input form">
                                                                <input id="credit-input" type="text"
                                                                    placeholder="0000 0000 0000 0000">
                                                                <img src="assets/images/payment/card.png" alt="card">
                                                            </div>
                                                        </div>
                                                        <div class="payment-card-info">
                                                            <div class="single-form form-default mm-yy">
                                                                <label>Expiration</label>
                                                                <div class="expiration d-flex">
                                                                    <div class="form-input form">
                                                                        <input type="text" placeholder="MM">
                                                                    </div>
                                                                    <div class="form-input form">
                                                                        <input type="text" placeholder="YYYY">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-form form-default">
                                                                <label>CVC/CVV <span><i
                                                                            class="mdi mdi-alert-circle"></i></span></label>
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="***">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default button">
                                                            <button type="submit" class="btn">pay now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </li> --}}
                                    {{-- <div class="single-form form-default button">
                                        <button type="submit" class="btn btn-primary">pay now</button>
                                    </div> --}}
                                </ul>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-sidebar">
                            <div class="checkout-sidebar-coupon">
                                <p>Apply Coupon to get discount!</p>
                                <form action="#">
                                    <div class="row single-form form-default">
                                        <div class="col form-input form">
                                            <input type="text" placeholder="Coupon Code">
                                        </div>
                                        <div class="col button">
                                            <button class="btn btn-primary">apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div class="checkout-sidebar-price-table mt-30 ">
                                <h4 class="title text-primary">Pricing Table</h4>

                                <div class="sub-total-price">
                                    @foreach ($cart->get() as $item)
                                        <div class="total-price shipping">
                                            <h6 class="value text-primary">{{ $item->food->name }}:</h6>
                                            <p class="item-details" style="display: flex;gap: 20px;">
                                                <span style="white-space: nowrap;">Size: {{ $item->options }}</span>
                                                <span style="white-space: nowrap;">Quan.: {{ $item->quantity }}</span>
                                                <span style="white-space: nowrap;">Price: ${{ $item->food->{$item->options} }}</span>
                                                <span style="white-space: nowrap;color: darkkhaki;font-weight: bold;">total: $
                                                    {{ $item->quantity*$item->food->{$item->options} }}    </span>
                                            </p>
                                        </div>
                                    @endforeach
                                    <hr>
                                    {{-- <div class="total-price">
                                        <p class="value">Subotal Price:</p>
                                        <p class="price">${{ $cart->total() }}</p>
                                    </div> --}}
                                    {{-- <div class="total-price shipping">
                                        <p class="value">Subotal Price:</p>
                                        <p class="price">$10.50</p>
                                    </div>
                                    <div class="total-price discount">
                                        <p class="value">Subotal Price:</p>
                                        <p class="price">$10.00</p>
                                    </div> --}}
                                </div>

                                <div class="total-payable">
                                    <div class="payable-price" style="color: darkkhaki;font-weight: bold;">
                                        <h4 style="color: darkkhaki;font-weight: bold;">Subotal Price:</h4>
                                        <h4 style="color: darkkhaki;font-weight: bold;">${{ $cart->total() }}</h4>
                                    </div>
                                </div>
                                <div class="price-table-btn button">
                                    <a href="javascript:void(0)" class="btn btn-alt btn-primary">Checkout</a>
                                </div>
                            </div>
                            <div class="checkout-sidebar-banner mt-30">
                                <a href="">
                                    <img src="{{ asset('frontAssets/assets/img/OIP.jpg')}}" style="width: 164px;
                                    margin-top: 30px;    margin-left: 80px;" alt="#">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection