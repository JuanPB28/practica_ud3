<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    private function validateRequest(Request $request): bool
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'email' => 'required|email',
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
            $usuarios = Usuario::all();
            return response()->json($usuarios, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los usuarios'], 500);
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
            $usuario = Usuario::find($id);
            if ($usuario) {
                return response()->json($usuario, 200);
            } else {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener el usuario'], 500);
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
            $usuario = Usuario::create($request->all());
            return response()->json($usuario, 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear el usuario'], 500);
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
            $usuario = Usuario::find($id);
            if ($usuario) {
                $usuario->update($request->all());
                return response()->json($usuario, 200);
            } else {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar el usuario'], 500);
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
            $usuario = Usuario::find($id);
            if ($usuario) {
                $usuario->delete();
                return response()->json(['message' => 'Usuario eliminado'], 200);
            } else {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar el usuario'], 500);
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
            $usuario = Usuario::find($id);
            if ($usuario) {
                return response()->json($usuario->mantenimientos, 200);
            } else {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
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
            $usuario = Usuario::find($id);
            if ($usuario) {
                return response()->json($usuario->incidencias, 200);
            } else {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener las incidencias'], 500);
        }
    }

    /**
     * Display a listing of the resource.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function equipos(int $id): JsonResponse
    {
        try {
            $usuario = Usuario::find($id);
            if ($usuario) {
                return response()->json($usuario->equipos, 200);
            } else {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los equipos'], 500);
        }
    }
}
