@extends('layouts.front')
@section('content')


<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita
                    . Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit
                    , sed stet lorem sit clita duo justo magna dolore erat amet</p>
                {{-- <a href="{{ route('booking') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a> --}}
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="{{ asset('frontAssets/assets/img/hero.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">

        @livewire('menu')
        @livewireScripts
    </div>
</div>
</div>

@endsection
