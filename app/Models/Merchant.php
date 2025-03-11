<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name', 'business_type', 'business_description',
        'tax_id', 'years_in_business', 'preferred_payment_methods',
        'business_latitude', 'business_longitude',
    ];

    protected $casts = ['preferred_payment_methods' => 'array'];

    public function user()
    {
        return $this->morphOne(User::class, 'profileable');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'merchant_favorite_products');
    }
}
