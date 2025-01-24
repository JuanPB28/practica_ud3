<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidencias')->insert([
            [
                'id_usuario' => 1,
                'id_equipo' => 1,
                'descripcion' => 'Pantalla rota',
                'estado' => 'pendiente',
            ],
            [
                'id_usuario' => 2,
                'id_equipo' => 2,
                'descripcion' => 'Teclado no funciona',
                'estado' => 'asignada',
            ],
            [
                'id_usuario' => 3,
                'id_equipo' => 3,
                'descripcion' => 'Ratón no funciona',
                'estado' => 'resuelta',
            ],
        ]);
    }
}
