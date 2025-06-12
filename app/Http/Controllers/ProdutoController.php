<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\User;


class ProdutoController extends Controller
{
    public function index() {
        $produtos = Produto::with('categoria')->get();

        return view('admin.produtos.index', compact('produtos'));
    }

    public function create() {
        $categorias = Categoria::all();

        return view('admin.produtos.create', compact('categorias'));
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        Produto::create($request->all());

        return redirect()->route('admin.produtos.index')->with('success', 'Produto criado com sucesso.');
    }

    public function edit($id) {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();

        return view('admin.produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('admin.produtos.index')->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy($id) {
        Produto::destroy($id);

        return redirect()->route('admin.produtos.index')->with('success', 'Produto deletado com sucesso.');
    }
}
