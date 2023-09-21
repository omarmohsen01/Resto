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
                <a href="{{ route('booking') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="{{ asset('frontAssets/assets/img/hero.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Service Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="row g-4">
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                    <h5>Master Chefs</h5>
                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                    <h5>Quality Food</h5>
                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                    <h5>Online Order</h5>
                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                    <h5>24/7 Service</h5>
                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Service End -->


<!-- About Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6">
            <div class="row g-3">
                <div class="col-6 text-start">
                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('frontAssets/assets/img/about-1.jpg')}}">
                </div>
                <div class="col-6 text-start">
                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('frontAssets/assets/img/about-2.jpg')}}" style="margin-top: 25%;">
                </div>
                <div class="col-6 text-end">
                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('frontAssets/assets/img/about-3.jpg')}}">
                </div>
                <div class="col-6 text-end">
                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('frontAssets/assets/img/about-4.jpg')}}">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
            <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
            <div class="row g-4 mb-4">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                        <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                        <div class="ps-4">
                            <p class="mb-0">Years of</p>
                            <h6 class="text-uppercase mb-0">Experience</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                        <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                        <div class="ps-4">
                            <p class="mb-0">Popular</p>
                            <h6 class="text-uppercase mb-0">Master Chefs</h6>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
        </div>
    </div>
</div>
</div>
<!-- About End -->


<!-- Menu Start -->

<div class="container-xxl py-5">
<div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
        <h1 class="mb-5">Most Popular Items</h1>
    </div>
    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
        @livewire('menu', ['limit' => 8])
        @livewireScripts
        <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('menu') }}">See Our Menu</a>
    </div>
</div>
</div>
<!-- Menu End -->


<!-- Reservation Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
<div class="row g-0">
    <div class="col-md-6">
        <div class="video">
            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                <span></span>
            </button>
        </div>
    </div>
    <div class="col-md-6 bg-dark d-flex align-items-center">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
            <h1 class="text-white mb-4">Book A Table Online</h1>
            <p>You Must Fill In Some Questions To Reserve Your Table..
                Or Call us <b>67890</b>
            </p>
            <a href="{{ route('booking') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>    
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content rounded-0">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- 16:9 aspect ratio -->
            <div class="ratio ratio-16x9">
                <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                    allow="autoplay"></iframe>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Reservation Start -->


<!-- Team Start -->
<div class="container-xxl pt-5 pb-3">
<div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
        <h1 class="mb-5">Our Master Chefs</h1>
    </div>
    <div class="row g-4">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item text-center rounded overflow-hidden">
                <div class="rounded-circle overflow-hidden m-4">
                    <img class="img-fluid" src="{{ asset('frontAssets/assets/img/team-1.jpg')}}" alt="">
                </div>
                <h5 class="mb-0">Full Name</h5>
                <small>Designation</small>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="team-item text-center rounded overflow-hidden">
                <div class="rounded-circle overflow-hidden m-4">
                    <img class="img-fluid" src="{{ asset('frontAssets/assets/img/team-2.jpg')}}" alt="">
                </div>
                <h5 class="mb-0">Full Name</h5>
                <small>Designation</small>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="team-item text-center rounded overflow-hidden">
                <div class="rounded-circle overflow-hidden m-4">
                    <img class="img-fluid" src="{{ asset('frontAssets/assets/img/team-3.jpg')}}" alt="">
                </div>
                <h5 class="mb-0">Full Name</h5>
                <small>Designation</small>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
            <div class="team-item text-center rounded overflow-hidden">
                <div class="rounded-circle overflow-hidden m-4">
                    <img class="img-fluid" src="{{ asset('frontAssets/assets/img/team-4.jpg')}}" alt="">
                </div>
                <h5 class="mb-0">Full Name</h5>
                <small>Designation</small>
                <div class="d-flex justify-content-center mt-3">
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Team End -->



@endsection

