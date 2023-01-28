<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_brands')->insert([
            'name' => 'razor',
            'image' => 'images/brands/ra.gif'
        ]);
        DB::table('model_brands')->insert([
            'name' => 'kaabo',
            'image' => 'images/brands/ka.png'
        ]);
        DB::table('model_brands')->insert([
            'name' => 'mi',
            'image' => 'images/brands/mi.png'
        ]);
    }
}
