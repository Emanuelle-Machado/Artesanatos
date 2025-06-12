<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\User;

class VendaController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function listSales()
    {
        $vendas = Venda::with(['user', 'produto'])->get();

        return view('admin.vendas.index', compact('vendas'));
    }

    public function createSale()
    {
        $users = User::all();
        $produtos = Produto::all();
        return view('admin.vendas.create', compact('users', 'produtos'));
    }

    public function storeSale(Request $request)
    {
        $data = $request->validate([
            'quantidade' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
            'produto_id' => 'required|exists:produtos,id',
            'forma_pagamento' => 'required|string|max:255',
        ]);

        $produto = Produto::find($data['produto_id']); // <- aqui estava faltando

        if (!$produto || !isset($produto->preco)) {
            return redirect()->back()->withErrors(['produto_id' => 'Produto não encontrado ou sem atributo de preço.']);
        }

        $data['valor_total'] = $data['quantidade'] * $produto->preco;

        Venda::create($data);
        return redirect('/admin/vendas');
    }


    public function editSale(Venda $venda)
    {
        $users = User::all();
        $produtos = Produto::all();
        return view('admin.vendas.edit', compact('venda', 'users', 'produtos'));
    }

    public function updateSale(Request $request, Venda $venda)
    {
        $data = $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'user_id' => 'required|exists:users,id',
            'quantidade' => 'required|integer|min:1',
            'forma_pagamento' => 'required|string|max:255',
        ]);

        $produto = Produto::find($data['produto_id']);

        if (!$produto) {
            return redirect()->back()->withErrors(['produto_id' => 'Produto não encontrado.']);
        }

        $data['valor_total'] = $data['quantidade'] * $produto->preco;

        $venda->update($data);

        return redirect('/admin/vendas');
    }


    public function deleteSale(Venda $venda)
    {
        $venda->delete();
        return redirect('/admin/vendas');
    }
}
