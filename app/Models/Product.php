<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'wishlist')->withTimestamps();
    }

    public function shoppingCartUsers()
    {
        return $this->belongsToMany(User::class, 'shoppingcart')->withTimestamps();
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
