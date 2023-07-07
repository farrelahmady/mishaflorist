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

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
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
