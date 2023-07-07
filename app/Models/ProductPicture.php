<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class ProductPicture extends Model
{
    use HasFactory, HasUuids;
}
