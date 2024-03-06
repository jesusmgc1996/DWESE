<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('developers')->delete();

        DB::table('developers')->insert([
            ['name' => 'Nintendo'],
            ['name' => 'Rockstar Games'],
            ['name' => 'Mojang'],
            ['name' => 'Epic Games'],
        ]);
    }
}
