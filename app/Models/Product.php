<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'farmer_id',
        'category_id',
        'name',
        'description',
        'unit_price',
        'unit_type',
        'available_quantity',
        'min_order_quantity',
        'harvest_date',
        'expiration_date',
        'is_organic',
        'certifications',
        'status',
    ];

    protected $casts = [
        'harvest_date' => 'date',
        'expiration_date' => 'date',
        'certifications' => 'array',
        'is_organic' => 'boolean',
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_images')
            ->useDisk('s3');
    }

    public function getPriceHistoryAttribute()
    {
        return PriceHistory::where('product_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'active')
            ->where('available_quantity', '>', 0);
    }
}
