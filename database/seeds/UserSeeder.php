<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'users_username' => 'rents',
            'users_password' => Hash::make('1234'),
            'users_telephone' => Str::random(10),
            'users_name' => Str::random(10),
            'users_status' => '0'
        ]);
        //
    }
}
