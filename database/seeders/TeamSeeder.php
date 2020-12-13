<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'Tottenham Hotspur',
            'strength' => 100,
        ]);
        DB::table('teams')->insert([
            'name' => 'Liverpool',
            'strength' => 80,
        ]);
        DB::table('teams')->insert([
            'name' => 'Chelsea',
            'strength' => 80,
        ]);
        DB::table('teams')->insert([
            'name' => 'Manchester United',
            'strength' => 60,
        ]);
    }
}
