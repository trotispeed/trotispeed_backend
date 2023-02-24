<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $appends = ['counter', 'percentage'];


    public function scooter()
    {
        return $this->belongsTo(Scooter::class, 'scooter_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCounterAttribute()
    {
        $updated_at_plus_reservation = Carbon::create($this->updated_at)->addHours($this->duration);
        $now = Carbon::now();

        if ($now->gt($updated_at_plus_reservation)) {
            return null;
        }
        return $now->diffAsCarbonInterval($updated_at_plus_reservation);
    }

    public function getPercentageAttribute()
    {
        $h = $this->getCounterAttribute()->h;
        if ($h == null) {
            return null;
        }
        $percent = $h * 100 / $this->duration;
        return $percent;
    }


}
