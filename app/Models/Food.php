<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;



class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable=[
        'name','slug','description',
        'category_id','status','rating'
        ,'small','medium','large'
    ];

    protected static function booted()
    {
        static::creating(function(Food $food){
           $food->slug=Str::slug($food->name);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function scopeFilter(Builder $builder,$filters)
    {
        $options=array_merge([
            'status'=>'active',
            'name'=>null,
            'category_id'=>null
        ],$filters);

        $builder->when($options['status'],function($query,$status){
            return $query->where('status',$status);
        });

        $builder->when($options['name'],function($query,$name){
            return $query->where('name',$name);
        });

        $builder->when($options['category_id'],function($query,$value){
           return $query->where('category_id',$value);
        });
    }
}
