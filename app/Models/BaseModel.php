<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::created(function (Model $model) {
            $modelName = class_basename($model);
            Log::info("New $modelName created: " . $model->toJson());
        });

        static::updated(function (Model $model) {
            $modelName = class_basename($model);
            Log::info("Existing $modelName updated: " . $model->toJson());
        });
    }
}
