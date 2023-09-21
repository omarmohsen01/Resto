<?php

namespace App\Http\Controllers\Interfaces\Front;

interface BookingServiceInterface{
    public function indexBooking();
    public function bookingShow($id);
    public function bookingStore($data);
    public function bookingUpdate($id,$data);
    public function bookingDelete($id);
}
