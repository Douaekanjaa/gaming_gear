<?php

namespace App\Models;
use App\Models\Product;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN_ROLE = 'ADMIN';
    const USER_ROLE = 'USER';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
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
        'password' => 'hashed',
    ];


    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlist')->withTimestamps();
    }

    public function shoppingcart()
    {
        return $this->belongsToMany(Product::class, 'shoppingcart')
                    ->withTimestamps();
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
