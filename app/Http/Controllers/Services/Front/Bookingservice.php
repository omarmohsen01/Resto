<?php
namespace App\Http\Controllers\Services\Front;

use App\Http\Controllers\Interfaces\Front\BookingServiceInterface;
use App\Models\Booking;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class BookingService implements BookingServiceInterface{
    public $booking;
    public function __construct(Booking $booking)
    {
        $this->booking=$booking;
    }
    public function indexBooking()
    {
        //
    }

    public function bookingShow($id)
    {
        return $this->booking->findOrFail($id);
    }

    public function bookingStore($data)
    {
        $table_id=$data->table_id;
        $startTime=$data->start_time;
        $endTime=$data->end_time;
        $booking_date=$data->booking_date;

        $confilctBooking=$this->booking->where('table_id',$table_id)
                ->where('booking_date',$booking_date)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->where(function ($query) use ($startTime, $endTime) {
                        $query->whereBetween('start_time',[$startTime,$endTime]);
                    })->orWhere(function ($query) use ($startTime, $endTime) {
                        $query->WhereBetween('end_time',[$startTime,$endTime]);
                    });
                })->exists();


        if(!$confilctBooking) {
            $booking=$this->booking->create([
                'user_id' => $data->user_id,
                'table_id' => $table_id,
                'booking_date' => $booking_date,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'special_request' => $data->special_request
            ]);
            return $booking;
        }
    }

    public function bookingUpdate($id,$data)
    {
        $booking=$this->booking->find($id);
        if($booking){
            $table = Table::find($data->table_id);
            $booking_date=$data->booking_date;
            $startTime=$data->start_time;
            $endTime=$data->end_time;

            $conflictingBooking = $this->booking->where('table_id', $table->id)
            ->where('booking_date', $booking_date)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime]);
            })->where('id', '<>', $booking->id) // Exclude the current booking from conflict check
            ->first();

            if(!$conflictingBooking) {
                $booking->update([
                    'user_id' => Auth::user()->id,
                    'booking_date' => $booking_date,
                    'start_time' => $startTime,
                    'end_time' => $endTime,
                    'table_id' => $table->id,
                    'special_request'=>$data->special_request
                ]);
                return true;
            }
        }
    }

    public function bookingDelete($id)
    {
        $booking=$this->booking->findOrFail($id);
        $booking->delete();
    }

}
