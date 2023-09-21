@extends('layouts.front')
@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">My Booking</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <x-alert />
            @forelse ($bookings as $booking)
                <div class="col-lg-4 col-sm-7 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h5 class="card-text">-Reservasion owner: {{ $booking->user->name }}</h5>
                            <h5 class="card-title">-Card Code: {{ $booking->id }}</h5>
                            <h6 class="card-title">-Table:No. {{ $booking->table_id }} have {{ $booking->table->capacity }} Chair</h6>
                            <p class="card-text">-Booking Date: {{ $booking->booking_date }} </p>
                            <p class="card-text">-From: {{ $booking->start_time }} To: {{ $booking->end_time }} </p>
                            <p class="card-text">-Special Request: {{ $booking->special_request }}</p>
                            <div >
                                <a href="{{ route('booking.edit',$booking->id) }}" class="btn btn-warning btn-sm">Update</a>
                                <a href="{{ route('booking.destroy',$booking->id) }}" class="btn btn-danger btn-sm hover">Cancel</a>
                            </div>
                            <small class="text-body-secondary">Last updated {{ $booking->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @empty    
                <div>
                    <p>You Don't Have Any Bookings</p>
                    <a class="btn btn-primary " href="{{ route('booking') }}">Book Table</a>
                </div>
            @endforelse            
        </div>
    </div>
</div>

@endsection