<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\FichaTecnicaController;
use App\Http\Controllers\TipoEquipoController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\IncidenciaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//

Route::apiResource('usuario', UsuarioController::class);
Route::apiResource('equipo', EquipoController::class);
Route::apiResource('tipo_equipo', TipoEquipoController::class);
Route::apiResource('ficha_tecnica', FichaTecnicaController::class);
Route::apiResource('operacion', OperacionController::class);
Route::apiResource('mantenimiento', MantenimientoController::class);
Route::apiResource('incidencia', IncidenciaController::class);

/* Ruta Usuario */
// CRUD
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::put('/usuario/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);
// Relaciones
Route::get('/usuario/{id}/mantenimientos', [UsuarioController::class, 'mantenimientos']);
Route::get('/usuario/{id}/incidencias', [UsuarioController::class, 'incidencias']);
Route::get('/usuario/{id}/equipos', [UsuarioController::class, 'equipos']);

/* Ruta Equipo */
// CRUD
Route::get('/equipos', [EquipoController::class, 'index']);
Route::get('/equipo/{id}', [EquipoController::class, 'show']);
Route::post('/equipo', [EquipoController::class, 'store']);
Route::put('/equipo/{id}', [EquipoController::class, 'update']);
Route::delete('/equipo/{id}', [EquipoController::class, 'destroy']);
// Relaciones
Route::get('/equipo/{id}/tipo', [EquipoController::class, 'tipo_equipo']);
Route::get('/equipo/{id}/ficha_tecnica', [EquipoController::class, 'ficha_tecnica']);
Route::get('/equipo/{id}/mantenimientos', [EquipoController::class, 'mantenimientos']);
Route::get('/equipo/{id}/incidencias', [EquipoController::class, 'incidencias']);

/* Ruta TipoEquipo */
// CRUD
Route::get('/tipos_equipos', [TipoEquipoController::class, 'index']);
Route::get('/tipo_equipo/{id}', [TipoEquipoController::class, 'show']);
Route::post('/tipo_equipo', [TipoEquipoController::class, 'store']);
Route::put('/tipo_equipo/{id}', [TipoEquipoController::class, 'update']);
Route::delete('/tipo_equipo/{id}', [TipoEquipoController::class, 'destroy']);
// Relaciones
Route::get('/tipo_equipo/{id}/equipos', [TipoEquipoController::class, 'equipos']);

/* Ruta FichaTecnica */
// CRUD
Route::get('/fichas_tecnicas', [FichaTecnicaController::class, 'index']);
Route::get('/ficha_tecnica/{id}', [FichaTecnicaController::class, 'show']);
Route::post('/ficha_tecnica', [FichaTecnicaController::class, 'store']);
Route::put('/ficha_tecnica/{id}', [FichaTecnicaController::class, 'update']);
Route::delete('/ficha_tecnica/{id}', [FichaTecnicaController::class, 'destroy']);
// Relaciones
Route::get('/ficha_tecnica/{id}/equipo', [FichaTecnicaController::class, 'equipo']);

/* Ruta Operacion */
// CRUD
Route::get('/operaciones', [OperacionController::class, 'index']);
Route::get('/operacion/{id}', [OperacionController::class, 'show']);
Route::post('/operacion', [OperacionController::class, 'store']);
Route::put('/operacion/{id}', [OperacionController::class, 'update']);
Route::delete('/operacion/{id}', [OperacionController::class, 'destroy']);
// Relaciones
Route::get('/operacion/{id}/mantenimientos', [OperacionController::class, 'mantenimientos']);

/* Ruta Mantenimiento */
// CRUD
Route::get('/mantenimientos', [MantenimientoController::class, 'index']);
Route::get('/mantenimiento/{id}', [MantenimientoController::class, 'show']);
Route::post('/mantenimiento', [MantenimientoController::class, 'store']);
Route::put('/mantenimiento/{id}', [MantenimientoController::class, 'update']);
Route::delete('/mantenimiento/{id}', [MantenimientoController::class, 'destroy']);
// Relaciones
Route::get('/mantenimiento/{id}/usuario', [MantenimientoController::class, 'usuario']);
Route::get('/mantenimiento/{id}/equipo', [MantenimientoController::class, 'equipo']);
Route::get('/mantenimiento/{id}/operaciones', [MantenimientoController::class, 'operaciones']);

/* Ruta Incidencia */
// CRUD
Route::get('/incidencias', [IncidenciaController::class, 'index']);
Route::get('/incidencia/{id}', [IncidenciaController::class, 'show']);
Route::post('/incidencia', [IncidenciaController::class, 'store']);
Route::put('/incidencia/{id}', [IncidenciaController::class, 'update']);
Route::delete('/incidencia/{id}', [IncidenciaController::class, 'destroy']);
// Relaciones
Route::get('/incidencia/{id}/usuario', [IncidenciaController::class, 'usuario']);
Route::get('/incidencia/{id}/equipo', [IncidenciaController::class, 'equipo']);
