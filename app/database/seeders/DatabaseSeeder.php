<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoEquipo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TipoEquipoSeeder::class,
            UsuarioSeeder::class,
            EquipoSeeder::class,
            FichaTecnicaSeeder::class,
            OperacionSeeder::class,
            MantenimientoSeeder::class,
            OperacionesMantenimientosSeeder::class,
            IncidenciaSeeder::class,
        ]);
    }
}
