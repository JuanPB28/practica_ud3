<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;
use App\Models\Usuario;

class UsuarioController extends Controller
{
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
}
