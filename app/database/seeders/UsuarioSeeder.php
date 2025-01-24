<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Juan',
                'email' => 'juan@ejemplo.com',
            ],
            [
                'nombre' => 'Ana',
                'email' => 'ana@ejemplo.com',
            ],
            [
                'nombre' => 'Luis',
                'email' => 'luis@ejemplo.com',
            ],
        ]);
    }
}
