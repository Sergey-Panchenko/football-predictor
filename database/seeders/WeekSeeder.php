<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weeks')->insert([
            'number' => 1
        ]);
        DB::table('weeks')->insert([
            'number' => 2
        ]);
        DB::table('weeks')->insert([
            'number' => 3
        ]);
        DB::table('weeks')->insert([
            'number' => 4
        ]);
        DB::table('weeks')->insert([
            'number' => 5
        ]);
        DB::table('weeks')->insert([
            'number' => 6
        ]);


    }
}
