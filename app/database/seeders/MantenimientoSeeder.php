<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MantenimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mantenimientos')->insert([
            [
                'id_usuario' => 1,
                'id_equipo' => 1,
                'observaciones' => 'El equipo no enciende',
            ],
            [
                'id_usuario' => 2,
                'id_equipo' => 2,
                'observaciones' => 'El equipo se apaga solo',
            ],
            [
                'id_usuario' => 3,
                'id_equipo' => 3,
                'observaciones' => 'El equipo no se conecta a la red',
            ],
        ]);
    }
}
