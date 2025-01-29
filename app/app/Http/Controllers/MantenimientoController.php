<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;
use App\Models\Mantenimiento;

class MantenimientoController extends Controller
{
    // CRUD

    /**
     * Display a listing of the resource.
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $mantenimientos = Mantenimiento::all();
            return response()->json($mantenimientos, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los mantenimientos'], 500);
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $mantenimiento = Mantenimiento::find($id);
            if ($mantenimiento) {
                return response()->json($mantenimiento, 200);
            } else {
                return response()->json(['message' => 'Mantenimiento no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el mantenimiento'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $mantenimiento = Mantenimiento::create($request->all());
            return response()->json($mantenimiento, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear el mantenimiento'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $mantenimiento = Mantenimiento::find($id);
            if ($mantenimiento) {
                $mantenimiento->update($request->all());
                return response()->json($mantenimiento, 200);
            } else {
                return response()->json(['message' => 'Mantenimiento no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar el mantenimiento'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $mantenimiento = Mantenimiento::find($id);
            if ($mantenimiento) {
                $mantenimiento->delete();
                return response()->json(['message' => 'Mantenimiento eliminado'], 200);
            } else {
                return response()->json(['message' => 'Mantenimiento no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar el mantenimiento'], 500);
        }
    }

    // Relationships

    /**
     *  Display the specified resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function usuario(int $id): JsonResponse
    {
        try {
            $mantenimiento = Mantenimiento::find($id);
            if ($mantenimiento) {
                return response()->json($mantenimiento->usuario, 200);
            } else {
                return response()->json(['message' => 'Mantenimiento no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el usuario del mantenimiento'], 500);
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function equipo(int $id): JsonResponse
    {
        try {
            $mantenimiento = Mantenimiento::find($id);
            if ($mantenimiento) {
                return response()->json($mantenimiento->equipo, 200);
            } else {
                return response()->json(['message' => 'Mantenimiento no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el equipo del mantenimiento'], 500);
        }
    }

    /**
     * Display a listing of the resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function operaciones(int $id): JsonResponse
    {
        try {
            $mantenimiento = Mantenimiento::find($id);
            if ($mantenimiento) {
                return response()->json($mantenimiento->operaciones, 200);
            } else {
                return response()->json(['message' => 'Mantenimiento no encontrado'], 404);
            }
        }
        catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener las operaciones del mantenimiento'], 500);
        }
    }
}
