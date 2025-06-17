<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Venda;

class VendaApiController extends Controller
{
     public function store(Request $request): JsonResponse
    {
        $venda = Venda::create($request->all());
        return response()->json($venda, 201);
    }

    public function index(): JsonResponse
    {
        return response()->json(Venda::all(), 200);
    }

    public function show($id): JsonResponse
    {
        $venda = Venda::findOrFail($id);
        return response()->json($venda, 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $venda = Venda::findOrFail($id);
        $venda->update($request->all());
        return response()->json($venda, 200);
    }

    public function destroy($id): JsonResponse
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();
        return response()->json(null, 204);
    }
}
