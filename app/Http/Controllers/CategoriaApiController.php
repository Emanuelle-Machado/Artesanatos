<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Categoria;

class CategoriaApiController extends Controller
{
     public function store(Request $request): JsonResponse
    {
        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function index(): JsonResponse
    {
        return response()->json(Categoria::all(), 200);
    }

    public function show($id): JsonResponse
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria, 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }

    public function destroy($id): JsonResponse
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json(null, 204);
    }
}
