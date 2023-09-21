<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItem extends Pivot
{
    use HasFactory;
    protected $table='order_items';
    public $incrementing=true; 

    public function food()
    {
        return $this->belongsTo(Food::class)->withDefault([
            'name'=>$this->food_name
        ]);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}