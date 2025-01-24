<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperacionesMantenimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operaciones_mantenimientos')->insert([
            [
                'id_operacion' => 1,
                'id_mantenimiento' => 1,
            ],
            [
                'id_operacion' => 2,
                'id_mantenimiento' => 2,
            ],
            [
                'id_operacion' => 3,
                'id_mantenimiento' => 3,
            ],
        ]);
    }
}
