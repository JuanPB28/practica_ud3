<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operaciones')->insert([
            [
                'nombre' => 'Instalación de software',
                'descripcion' => 'Instalación de software en el equipo',
            ],
            [
                'nombre' => 'Limpieza de componentes',
                'descripcion' => 'Limpieza de componentes internos del equipo',
            ],
            [
                'nombre' => 'Actualización de drivers',
                'descripcion' => 'Actualización de drivers del equipo',
            ],
        ]);
    }
}
