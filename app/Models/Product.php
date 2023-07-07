<?php

namespace App\Models;

use App\Models\ProductPicture;
use App\Models\ProductCategory;
use App\Models\BaseModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category', 'pictures'];
    protected $appends = ['discounted_price'];
    protected $casts = [
        'quantity' => 'integer',
        'discount' => 'integer',
        'is_featured' => 'boolean',
        'product_category_id' => 'integer',
    ];

    protected function getDiscountedPriceAttribute(): int
    {
        $value = $this->price;
        return (int) $value - ($value * $this->discount / 100);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function pictures()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
