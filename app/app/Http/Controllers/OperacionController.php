<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Operacion;
use Exception;

class OperacionController extends Controller
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
            $operaciones = Operacion::all();
            return response()->json($operaciones, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener las operaciones'], 500);
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
            $operacion = Operacion::find($id);
            if ($operacion) {
                return response()->json($operacion, 200);
            } else {
                return response()->json(['message' => 'Operacion no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener la operacion'], 500);
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
            $operacion = Operacion::create($request->all());
            return response()->json($operacion, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear la operacion'], 500);
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
            $operacion = Operacion::find($id);
            if ($operacion) {
                $operacion->update($request->all());
                return response()->json($operacion, 200);
            } else {
                return response()->json(['message' => 'Operacion no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar la operacion'], 500);
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
            $operacion = Operacion::find($id);
            if ($operacion) {
                $operacion->delete();
                return response()->json(['message' => 'Operacion eliminada'], 200);
            } else {
                return response()->json(['message' => 'Operacion no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar la operacion'], 500);
        }
    } 

    // Relationships

    /**
     * Display a listing of the resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function mantenimientos(int $id): JsonResponse
    {
        try {
            $operacion = Operacion::find($id);
            if ($operacion) {
                return response()->json($operacion->mantenimientos, 200);
            } else {
                return response()->json(['message' => 'Operacion no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los mantenimientos de la operacion'], 500);
        }
    }
}
