<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitializeCoachesAndTeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coaches')->insert(
            [
                ['name' => '監督さん１'],
                ['name' => '監督さん２'],
                ['name' => '監督さん３'],
            ]
        );

        DB::table('teams')->insert(
            [
                ['name' => 'チームA', 'coach_id' => 1],
                ['name' => 'チームB', 'coach_id' => 2],
                ['name' => 'チームC', 'coach_id' => 3],
                ['name' => 'チームD', 'coach_id' => null],
                ['name' => 'チームE', 'coach_id' => null],
            ]
        );
    }
}
