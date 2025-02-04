<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\FichaTecnica;

class FichaTecnicaController extends Controller
{
    private function validateRequest(Request $request): bool
    {
        $validator = Validator::make($request->all(), [
            'id_equipo' => 'required|integer',
            'num_serie' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'so' => 'required|string',
            'componentes' => 'required|string',
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
            $fichasTecnicas = FichaTecnica::all();
            return response()->json($fichasTecnicas, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener las fichas técnicas'], 500);
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
            $fichaTecnica = FichaTecnica::find($id);
            if ($fichaTecnica) {
                return response()->json($fichaTecnica, 200);
            } else {
                return response()->json(['message' => 'Ficha técnica no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener la ficha técnica'], 500);
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
            $fichaTecnica = FichaTecnica::create($request->all());
            return response()->json($fichaTecnica, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear la ficha técnica'], 500);
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
            $fichaTecnica = FichaTecnica::find($id);
            if ($fichaTecnica) {
                $fichaTecnica->update($request->all());
                return response()->json($fichaTecnica, 200);
            } else {
                return response()->json(['message' => 'Ficha técnica no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar la ficha técnica'], 500);
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
            $fichaTecnica = FichaTecnica::find($id);
            if ($fichaTecnica) {
                $fichaTecnica->delete();
                return response()->json($fichaTecnica, 200);
            } else {
                return response()->json(['message' => 'Ficha técnica no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar la ficha técnica'], 500);
        }
    }

    // Relationships

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function equipo(int $id): JsonResponse
    {
        try {
            $fichaTecnica = FichaTecnica::find($id);
            if ($fichaTecnica) {
                return response()->json($fichaTecnica->equipo, 200);
            } else {
                return response()->json(['message' => 'Ficha técnica no encontrada'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el equipo de la ficha técnica'], 500);
        }
    }
}
