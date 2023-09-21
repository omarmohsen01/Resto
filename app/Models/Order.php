<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
            'user_id','payment_method','status','payment_status','total','shipping'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id')
        ->withDefault(['name'=>'Guest Customer']);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class,'order_items','order_id','food_id','id','id')
        ->withPivot([
            'food_name','price','quantity','cola','fries'
        ]);
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function billingAddress()
    {
        return $this->hasOne(OrderAddress::class,'order_id','id')
            ->where('type','=','billing');
    }

    public function shippingAddress()
    {
        return $this->hasOne(OrderAddress::class,'order_id','id')
            ->where('type','=','shipping');
    }

    public static function booted()
    {
        static::creating(function(Order $order){
            $order->number=Order::getNextOrderNymber() ;
        });
    }

    public static function getNextOrderNymber()
    {
        $year=Carbon::now()->year;
        $number=Order::whereYear('created_at',$year)->max('number');
        if($number)
        {
            return $number+1;
        }
        return $year.'0001';
    }
}
