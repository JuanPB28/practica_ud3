<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Validator;

class IncidenciaController extends Controller
{
    private function validateRequest(Request $request): bool
    {
        $validator = Validator::make($request->all(), [
            'id_usuario' => 'required|integer',
            'id_equipo' => 'required|integer',
            'descripcion' => 'required|string',
            'estado' => 'required|string',
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
            $incidencias = Incidencia::all();
            return response()->json($incidencias, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener las incidencias'], 500);
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
            $incidencia = Incidencia::find($id);
            if ($incidencia) {
                return response()->json($incidencia, 200);
            } else {
                return response()->json(['message' => 'Incidencia no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener la incidencia'], 500);
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
            $incidencia = Incidencia::create($request->all());
            return response()->json($incidencia, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear la incidencia'], 500);
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
            $incidencia = Incidencia::find($id);
            if ($incidencia) {
                $incidencia->update($request->all());
                return response()->json($incidencia, 200);
            } else {
                return response()->json(['message' => 'Incidencia no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar la incidencia'], 500);
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
            $incidencia = Incidencia::find($id);
            if ($incidencia) {
                $incidencia->delete();
                return response()->json(['message' => 'Incidencia eliminada'], 200);
            } else {
                return response()->json(['message' => 'Incidencia no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar la incidencia'], 500);
        }
    }

    // Relationships

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function usuario(int $id): JsonResponse
    {
        try {
            $incidencia = Incidencia::find($id);
            if ($incidencia) {
                return response()->json($incidencia->usuario, 200);
            } else {
                return response()->json(['message' => 'Incidencia no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el usuario de la incidencia'], 500);
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
            $incidencia = Incidencia::find($id);
            if ($incidencia) {
                return response()->json($incidencia->equipo, 200);
            } else {
                return response()->json(['message' => 'Incidencia no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el equipo de la incidencia'], 500);
        }
    }
}
