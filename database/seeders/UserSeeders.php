<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Chaimae',
            'email' => 'chaimae@trotispeed.com',
            'password' => Hash::make('admin123!@#'),
            'role_id' => 1,
            'profile_pic' => '/images/users/chaimae.jpg'
        ]);

        DB::table('users')->insert([
            'name' => 'Adnane',
            'email' => 'adnane@adnane.com',
            'password' => Hash::make('adnane'),
            'role_id' => 2,
            'profile_pic' => '/images/users/adnane.jpg'
        ]);

        DB::table('users')->insert([
            'name' => 'oussama',
            'email' => 'oussama@oussama.com',
            'password' => Hash::make('oussama'),
            'role_id' => 2,
            'profile_pic' => '/images/users/oussama.jpg'
        ]);

    }
}
