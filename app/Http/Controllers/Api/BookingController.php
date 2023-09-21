<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Front\BookingServiceInterface;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $bookingService;
    public function __construct(BookingServiceInterface $bookingService)
    {
        $this->bookingService=$bookingService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Booking::filter($request->query())->with('user','table')->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $booking=$this->bookingService->bookingStore($request);
        if($booking){
            return $booking;
        }else{
            return ['message'=>'The selected table is not available at the specified time.'];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking=$this->bookingService->bookingShow($id);
        if($booking){
            return $booking;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingRequest $request, string $id)
    {
        $updated=$this->bookingService->bookingUpdate($id,$request);
        if(!$updated) {
            return ['message'=>'The selected table is not available at the specified time.'];
        }else{
            return ['message'=>'Your Reservasion Has Been Updated'];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookingService->bookingDelete($id);
        return ['message'=>'this booking deleted'];
    }

    public function showUserBooking()
    {
        $user_id=Auth::id();
        $booking=Booking::where('user_id',$user_id);
        if($booking){
            
        }
    }

    public function DeleteReservasion(){

    }
}
