<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 week
        DB::table('games')->insert([
            'home_team_id' => 1,
            'away_team_id' => 2,
            'week_number' => 1,
        ]);
        DB::table('games')->insert([
            'home_team_id' => 3,
            'away_team_id' => 4,
            'week_number' => 1,
        ]);

        // 2 week
        DB::table('games')->insert([
            'home_team_id' => 1,
            'away_team_id' => 3,
            'week_number' => 2,
        ]);
        DB::table('games')->insert([
            'home_team_id' => 2,
            'away_team_id' => 4,
            'week_number' => 2,
        ]);

        // 3 week
        DB::table('games')->insert([
            'home_team_id' => 2,
            'away_team_id' => 1,
            'week_number' => 3,
        ]);
        DB::table('games')->insert([
            'home_team_id' => 4,
            'away_team_id' => 3,
            'week_number' => 3,
        ]);

        // 4 week
        DB::table('games')->insert([
            'home_team_id' => 3,
            'away_team_id' => 1,
            'week_number' => 4,
        ]);
        DB::table('games')->insert([
            'home_team_id' => 4,
            'away_team_id' => 2,
            'week_number' => 4,
        ]);

        // 5 week
        DB::table('games')->insert([
            'home_team_id' => 1,
            'away_team_id' => 4,
            'week_number' => 5,
        ]);
        DB::table('games')->insert([
            'home_team_id' => 3,
            'away_team_id' => 2,
            'week_number' => 5,
        ]);
        // 6 week
        DB::table('games')->insert([
            'home_team_id' => 4,
            'away_team_id' => 1,
            'week_number' => 6,
        ]);
        DB::table('games')->insert([
            'home_team_id' => 2,
            'away_team_id' => 3,
            'week_number' => 6,
        ]);

    }
}
