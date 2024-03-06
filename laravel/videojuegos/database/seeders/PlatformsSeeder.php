<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platforms')->delete();

        DB::table('platforms')->insert([
            ['name' => 'Nintendo Entertainment System (NES)'],
            ['name' => 'Nintendo Switch'],
            ['name' => 'PlayStation 3'],
            ['name' => 'PC'],
            ['name' => 'Xbox One'],
        ]);
    }
}
