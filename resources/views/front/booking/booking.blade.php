@extends('layouts.front')
@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
            </ol>
        </nav>
    </div>
</div>
</div>
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
                    <x-alert />
                    @auth
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <x-forms.input type="date" name="booking_date"  class="form-control datepicker-input" placeholder="Date" />
                                    <label for="date">Date</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <x-forms.input type="time" name="start_time"  class="form-control datepicker-input" placeholder="Date" />
                                    <label for="date">Start Time</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <x-forms.input type="time" name="end_time"  class="form-control datepicker-input" placeholder="Date" />
                                    <label for="date">End Time</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="table_id" class="form-select @error('table_id')
                                    is-invalid @enderror" id="select1">
                                      @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">
                                            Table #{{ $table->id }} No {{ $table->capacity }}</option>
                                      @endforeach  
                                    </select>
                                    <label for="select1">Table Has Chair</label>
                                    @error('table_id')
                                        <div class="text-danger" style="width: 450px">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <x-forms.text-area name="special_request" placeholder="Special Request" />
                                    <label for="message">Special Request</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                            </div>
                        </div>
                    </form>
                    @endauth
                    @guest
                        please <a href="{{ route('register') }}">Register</a>
                         Or If You Have An Account <a href="{{ route('login') }}">Login</a>
                          First to Book Your Table
                    @endguest
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

@endsection