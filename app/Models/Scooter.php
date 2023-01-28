<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scooter extends Model
{
    use HasFactory;

    protected $appends = ['stock'];

    protected $fillable = [
        "model",
        "battery",
        "max_weight",
        "weight",
        "max_speed",
        "range",
        "base_price",
        "pic",
        "model_image",
        "brand_id"

    ];

    public function getStockAttribute()
    {
        return true;
    }
}
