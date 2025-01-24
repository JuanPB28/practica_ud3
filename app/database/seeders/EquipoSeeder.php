<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipos')->insert([
            [
                'aula' => 'Aula 1',
                'mesa' => 'Mesa 1',
            ],
            [
                'aula' => 'Aula 2',
                'mesa' => 'Mesa 2',
            ],
            [
                'aula' => 'Aula 3',
                'mesa' => 'Mesa 3',
            ],
        ]);
    }
}
