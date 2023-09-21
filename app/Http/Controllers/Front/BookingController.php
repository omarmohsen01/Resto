<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Front\BookingServiceInterface;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

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
    public function index()
    {
        $tables=Table::all();
        return view('front.booking.booking',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $booking=$this->bookingService->bookingStore($request);
        if($booking){
            return redirect()->route('mybooking')
                 ->with('success','Your Reservasion Has Been Registered');
        }else{
            return redirect()->route('booking')
                ->with('fail','The selected table is not available at the specified time.');
        }
        
    }

    public function show(string $id)
    {}

    /**
     * Display the specified resource.
     */
    public function myBooking()
    {
        $user=Auth::user();
        $bookings=Booking::where('user_id','=',$user->id)->with(['user','table'])->get();
        return view('front.booking.myBooking',compact('bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking=Booking::findOrFail($id);
        $tables=Table::all();
        return view('front.booking.editBooking',compact('booking','tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingRequest $request, string $id)
    {
        $updated=$this->bookingService->bookingUpdate($id,$request);    
        if(!$updated) {
            return back()
                ->with('fail','The selected table is not available at the specified time.');
        }else{
            return redirect()->route('mybooking')
                ->with('success','Your Reservasion Has Been Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookingService->bookingDelete($id);
        return Redirect::route('mybooking')
                ->with('success','Your Reservasion Has Been Deleted');
    }
}