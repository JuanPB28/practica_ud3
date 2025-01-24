<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\FichaTecnicaController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\IncidenciaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//

Route::apiResource('usuario', UsuarioController::class);
Route::apiResource('equipo', EquipoController::class);
Route::apiResource('ficha_tecnica', FichaTecnicaController::class);
Route::apiResource('operacion', OperacionController::class);
Route::apiResource('mantenimiento', MantenimientoController::class);
Route::apiResource('incidencia', IncidenciaController::class);

// Ruta Usuario
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::put('/usuario/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);

Route::get('/usuario/{id}/incidencias', [UsuarioController::class, 'incidencias']);
Route::get('/usuario/{id}/mantenimientos', [UsuarioController::class, 'mantenimientos']);
Route::get('/usuario/{id}/equipos', [UsuarioController::class, 'equipos']);

// Ruta Equipo
Route::get('/equipos', [EquipoController::class, 'index']);
Route::get('/equipo/{id}', [EquipoController::class, 'show']);
Route::post('/equipo', [EquipoController::class, 'store']);
Route::put('/equipo/{id}', [EquipoController::class, 'update']);
Route::delete('/equipo/{id}', [EquipoController::class, 'destroy']);

Route::get('/equipo/{id}/ficha_tecnica', [EquipoController::class, 'ficha_tecnica']);
Route::get('/equipo/{id}/incidencias', [EquipoController::class, 'incidencias']);
Route::get('/equipo/{id}/mantenimientos', [EquipoController::class, 'mantenimientos']);

// Ruta FichaTecnica
Route::get('/fichas_tecnicas', [FichaTecnicaController::class, 'index']);
Route::get('/ficha_tecnica/{id}', [FichaTecnicaController::class, 'show']);
Route::post('/ficha_tecnica', [FichaTecnicaController::class, 'store']);
Route::put('/ficha_tecnica/{id}', [FichaTecnicaController::class, 'update']);
Route::delete('/ficha_tecnica/{id}', [FichaTecnicaController::class, 'destroy']);

// Ruta Operacion
Route::get('/operaciones', [OperacionController::class, 'index']);
Route::get('/operacion/{id}', [OperacionController::class, 'show']);
Route::post('/operacion', [OperacionController::class, 'store']);
Route::put('/operacion/{id}', [OperacionController::class, 'update']);
Route::delete('/operacion/{id}', [OperacionController::class, 'destroy']);

// Ruta Mantenimiento
Route::get('/mantenimientos', [MantenimientoController::class, 'index']);
Route::get('/mantenimiento/{id}', [MantenimientoController::class, 'show']);
Route::post('/mantenimiento', [MantenimientoController::class, 'store']);
Route::put('/mantenimiento/{id}', [MantenimientoController::class, 'update']);
Route::delete('/mantenimiento/{id}', [MantenimientoController::class, 'destroy']);

Route::get('/mantenimiento/{id}/operaciones', [MantenimientoController::class, 'operaciones']);

// Ruta Incidencia
Route::get('/incidencias', [IncidenciaController::class, 'index']);
Route::get('/incidencia/{id}', [IncidenciaController::class, 'show']);
Route::post('/incidencia', [IncidenciaController::class, 'store']);
Route::put('/incidencia/{id}', [IncidenciaController::class, 'update']);
Route::delete('/incidencia/{id}', [IncidenciaController::class, 'destroy']);
