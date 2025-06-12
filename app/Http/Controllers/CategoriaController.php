<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\User;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();

        return view('admin.categorias.index', compact('categorias'));
    }

    public function create() {
        return view('admin.categorias.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        Categoria::create($request->all());

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria criada com sucesso.');
    }

    public function edit($id) {
        $categoria = Categoria::findOrFail($id);

        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy($id) {
        Categoria::destroy($id);

        return redirect()->route('admin.categorias.index')->with('success', 'Categoria deletada com sucesso.');
    }
}
