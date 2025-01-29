<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_equipos')->insert([
            [
                'nombre' => 'Portátil',
                'descripcion' => 'Equipo portátil',
            ],
            [
                'nombre' => 'Sobremesa',
                'descripcion' => 'Equipo sobremesa',
            ],
            [
                'nombre' => 'Tablet',
                'descripcion' => 'Tablet',
            ],
        ]);
    }
}
