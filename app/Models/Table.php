<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Table extends Model
{
    use HasFactory;
    protected $fillable=[
        'description','capacity'
    ];

    public function bookings()
    {
        return $this->HasMany(Booking::class,'table_id','id');
    }
    
    public function scopeFilter(Builder $builder,$filters)
    {
        $options=array_merge([
            'capacity'=>null
        ],$filters);
        
        $builder->when($options['capacity'],function($query,$value){
           return $query->where('capacity',$value); 
        });
    }
}