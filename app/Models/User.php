<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
     /**
      * Relations
      */
    public function user_addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function user_payment()
    {
        return $this->hasMany(UserPayment::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    // public function sessions()
    // {
    //     return $this->hasMany(ShoppingSession::class);
    // }

    public function cart_items()
    {
        return $this->hasManyThrough(
            CartItem::class,
            \App\Models\Session::class,
            // 'user_id', // Foreign key on the sessions table...
            // 'session_id', // Foreign key on the cart_items table...
            // 'id', // Local key on the projects table...
            // 'id' // Local key on the environments table...
        );
    }

}
