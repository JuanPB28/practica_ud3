<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;
use App\Models\TipoEquipo;
use Illuminate\Support\Facades\Validator;

class TipoEquipoController extends Controller
{
    private function validateRequest(Request $request): bool
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return false;
        }
    }

    // CRUD

    /**
     * Display a listing of the resource.
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $tiposEquipos = TipoEquipo::all();
            return response()->json($tiposEquipos, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los tipos de equipos'], 500);
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
            $tipoEquipo = TipoEquipo::find($id);
            if ($tipoEquipo) {
                return response()->json($tipoEquipo, 200);
            } else {
                return response()->json(['message' => 'Tipo de equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el tipo de equipo'], 500);
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
        if (!$this->validateRequest($request)) {
            return response()->json(['message' => 'Datos incorrectos'], 400);
        }

        try {
            $tipoEquipo = TipoEquipo::create($request->all());
            return response()->json($tipoEquipo, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear el tipo de equipo'], 500);
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
        if (!$this->validateRequest($request)) {
            return response()->json(['message' => 'Datos incorrectos'], 400);
        }
        
        try {
            $tipoEquipo = TipoEquipo::find($id);
            if ($tipoEquipo) {
                $tipoEquipo->update($request->all());
                return response()->json($tipoEquipo, 200);
            } else {
                return response()->json(['message' => 'Tipo de equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar el tipo de equipo'], 500);
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
            $tipoEquipo = TipoEquipo::find($id);
            if ($tipoEquipo) {
                $tipoEquipo->delete();
                return response()->json(['message' => 'Tipo de equipo eliminado'], 200);
            } else {
                return response()->json(['message' => 'Tipo de equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar el tipo de equipo'], 500);
        }
    }

    // Relationships

    /**
     * Display a listing of the resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function equipos(int $id): JsonResponse
    {
        try {
            $tipoEquipo = TipoEquipo::find($id);
            if ($tipoEquipo) {
                return response()->json($tipoEquipo->equipos, 200);
            } else {
                return response()->json(['message' => 'Tipo de equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los equipos del tipo de equipo'], 500);
        }
    }
}
