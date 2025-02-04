<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class EquipoController extends Controller
{
    private function validateRequest(Request $request): bool
    {
        $validator = Validator::make($request->all(), [
            'id_tipo_equipo' => 'required|integer',
            'aula' => 'required|string',
            'mesa' => 'required|string',
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
            $equipos = Equipo::all();
            return response()->json($equipos, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los equipos'], 500);
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
            $equipo = Equipo::find($id);
            if ($equipo) {
                return response()->json($equipo, 200);
            } else {
                return response()->json(['message' => 'Equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el equipo'], 500);
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
            $equipo = Equipo::create($request->all());
            return response()->json($equipo, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear el equipo'], 500);
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
            $equipo = Equipo::find($id);
            if ($equipo) {
                $equipo->update($request->all());
                return response()->json($equipo, 200);
            } else {
                return response()->json(['message' => 'Equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar el equipo'], 500);
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
            $equipo = Equipo::find($id);
            if ($equipo) {
                $equipo->delete();
                return response()->json(['message' => 'Equipo eliminado'], 200);
            } else {
                return response()->json(['message' => 'Equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar el equipo'], 500);
        }
    }

    // Relationships

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function tipo_equipo(int $id): JsonResponse
    {
        try {
            $equipo = Equipo::find($id);
            if ($equipo) {
                return response()->json($equipo->tipoEquipo, 200);
            } else {
                return response()->json(['message' => 'Equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el tipo de equipo'], 500);
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function ficha_tecnica(int $id): JsonResponse
    {
        try {
            $equipo = Equipo::find($id);
            if ($equipo) {
                return response()->json($equipo->fichaTecnica, 200);
            } else {
                return response()->json(['message' => 'Equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener la ficha técnica'], 500);
        }
    }

    /**
     * Display a listing of the resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function mantenimientos(int $id): JsonResponse
    {
        try {
            $equipo = Equipo::find($id);
            if ($equipo) {
                return response()->json($equipo->mantenimientos, 200);
            } else {
                return response()->json(['message' => 'Equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los mantenimientos'], 500);
        }
    }

    /**
     * Display a listing of the resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function incidencias(int $id): JsonResponse
    {
        try {
            $equipo = Equipo::find($id);
            if ($equipo) {
                return response()->json($equipo->incidencias, 200);
            } else {
                return response()->json(['message' => 'Equipo no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener las incidencias'], 500);
        }
    }
}
