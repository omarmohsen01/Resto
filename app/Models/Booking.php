<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','table_id','booking_date','start_time','end_time','special_request'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function scopefilter(Builder $builder,$filters)
    {
        $options=array_merge([
            'user_id'=>null,
            'table_id'=>null,
            'booking_date'=>null,
            'start_time'=>null,
            'end_time'=>null
        ],$filters);
        
        $builder->when($options['user_id'],function($query,$value){
            $query->where('user_id',$value); 
        });

        $builder->when($options['table_id'],function($query,$value){
            $query->where('table_id',$value); 
        });

        $builder->when($options['booking_date'],function($query,$value){
            $query->where('booking_date',$value); 
        });

        $builder->when($options['start_time'],function($query,$value){
            $query->where('start_time',$value); 
        });

        $builder->when($options['end_time'],function($query,$value){
            $query->where('end_time',$value); 
        });
    }
}