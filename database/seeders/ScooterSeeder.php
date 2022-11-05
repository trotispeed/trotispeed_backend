<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scooters')->insert(
            [
                'model' => 'Gotrax',
                'battery' => 300,
                'max_weight' => 90,
                'weight' => 67,
                'max_speed' => 16,
                'range' => 67,
                'base_price' => 120,
                'pic' => '/images/scooters/a.jpg'
            ]
        );
    }
}
