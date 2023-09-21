<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','description','status','slug'
    ];

    protected $hidden=[
        'created_at','updated_at'
    ];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    protected static function booted()
    {
        static::creating(function(Category $category){
           $category->slug=Str::slug($category->name); 
        });
    }
    
    public function scopeFilter(Builder $builder,$filters)
    {
        $options=array_merge([
            'status'=>'active',
            'name'=>null
        ],$filters);
        
        $builder->when($options['status'],function($query,$status){
            return $query->where('status',$status); 
        });

        $builder->when($options['name'],function($query,$name){
            return $query->where('name',$name); 
        });
    }
}