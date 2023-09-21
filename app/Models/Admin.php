<?php

namespace App\Models;

use App\Concerns\HasRolles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends User
{
    use HasApiTokens,HasFactory,Notifiable,HasRolles;

    protected $fillable=[
        'name','email','password','phone_number','super_admin','status'
    ];


    public function scopeFilter(Builder $builder,$filters)
    {
        $options=array_merge([
            'name'=>null,
            'email'=>null,
            'super_admin'=>null
        ],$filters);

        $builder->when($options['name'],function($query,$name){
            return $query->where('name',$name);
        });

        $builder->when($options['email'],function($query,$email){
            return $query->where('email',$email);
        });

        $builder->when($options['super_admin'],function($query,$super_admin){
            return $query->where('super_admin',$super_admin);
        });
    }
}
