<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Produto;

class ProdutoApiController extends Controller
{
        public function store(Request $request): JsonResponse
    {
        $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    public function index()
    {
        return response()->json(Produto::all(), 200);
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json($produto, 200);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return response()->json($produto, 200);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return response()->json(null, 204);
    }
}
