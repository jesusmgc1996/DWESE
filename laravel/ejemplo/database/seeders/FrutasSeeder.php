<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fruta;

class FrutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('frutas')->delete();

        /*DB::table('frutas')->insert([
            ['nombrefruta' => 'manzana', 'temporada' => 1, 'pais' => 'España'],
            ['nombrefruta' => 'naranja', 'temporada' => 2, 'pais' => 'España'],
            ['nombrefruta' => 'fresa', 'temporada' => 1, 'pais' => 'Francia'],
            ['nombrefruta' => 'melón', 'temporada' => 2, 'pais' => 'Marruecos']
        ]);*/

        $fruta = new Fruta();
        $fruta->nombrefruta = "manzana";
        $fruta->temporada = 1;
        $fruta->pais = "España";
        $fruta->save();

        $fruta = new Fruta();
        $fruta->nombrefruta = "naranja";
        $fruta->temporada = 2;
        $fruta->pais = "España";
        $fruta->save();

        $fruta = new Fruta();
        $fruta->nombrefruta = "fresa";
        $fruta->temporada = 1;
        $fruta->pais = "Francia";
        $fruta->save();

        $fruta = new Fruta();
        $fruta->nombrefruta = "melón";
        $fruta->temporada = 2;
        $fruta->pais = "Marruecos";
        $fruta->save();
    }
}
