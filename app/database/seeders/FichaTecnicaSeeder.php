<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FichaTecnicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fichas_tecnicas')->insert([
            [
                'id_equipo' => 1,
                'num_serie' => '123456',
                'marca' => 'HP',
                'modelo' => 'Pavilion',
                'so' => 'Windows 10',
                'componentes' => 'Intel Core i5, 8 GB RAM, 256 GB SSD',
            ],
            [
                'id_equipo' => 2,
                'num_serie' => '654321',
                'marca' => 'Acer',
                'modelo' => 'Aspire',
                'so' => 'Windows 11',
                'componentes' => 'Intel Core i7, 16 GB RAM, 512 GB SSD',
            ],
            [
                'id_equipo' => 3,
                'num_serie' => '987654',
                'marca' => 'Lenovo',
                'modelo' => 'ThinkPad',
                'so' => 'Ubuntu 20.04',
                'componentes' => 'Intel Core i3, 4 GB RAM, 128 GB SSD',
            ],
        ]);
    }
}
