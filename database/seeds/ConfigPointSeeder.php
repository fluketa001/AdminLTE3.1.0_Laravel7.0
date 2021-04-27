<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConfigPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config_points')->insert([
            'config_points_price' => '1',
            'config_points_rate_change' => '1000',
            'config_points_expire' => '31'
        ]);
        //
    }
}
