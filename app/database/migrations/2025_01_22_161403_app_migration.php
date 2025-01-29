<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
        });

        Schema::create('operaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('descripcion');
        });

        Schema::create('tipos_equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('descripcion');
        });

        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipo_equipo')->constrained('tipos_equipos');
            $table->string('aula');
            $table->string('mesa');
        });

        Schema::create('fichas_tecnicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_equipo')->constrained('equipos');
            $table->string('num_serie');
            $table->string('marca');
            $table->string('modelo');
            $table->string('so');
            $table->string('componentes');
            $table->timestamps();
        });

        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->foreignId('id_equipo')->constrained('equipos');
            $table->string('observaciones');
            $table->timestamps();
        });

        Schema::create('operaciones_mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_operacion')->constrained('operaciones');
            $table->foreignId('id_mantenimiento')->constrained('mantenimientos');
            $table->timestamps();
        });

        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios')->nullable();
            $table->foreignId('id_equipo')->constrained('equipos');
            $table->string('descripcion');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
        Schema::dropIfExists('operaciones_mantenimientos');
        Schema::dropIfExists('mantenimientos');
        Schema::dropIfExists('fichas_tecnicas');
        Schema::dropIfExists('equipos');
        Schema::dropIfExists('tipos_equipos');
        Schema::dropIfExists('operaciones');
        Schema::dropIfExists('usuarios');
    }
};
