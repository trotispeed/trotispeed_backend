<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "allocation_date",
        "scooter_id",
        "cin",
        "scooter_id",
        "user_id",
        "user_tel",
        "cin_back",
        "cin_front"
    ];

}
