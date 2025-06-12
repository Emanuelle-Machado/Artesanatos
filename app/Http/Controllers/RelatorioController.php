<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\User;
use App\Models\Categoria;

class RelatorioController extends Controller
{
    public function index()
    {
        // 1. Total de usuários (clientes)
        $totalUsuarios = User::count();

        // 2. Total de vendas
        $totalVendas = Venda::count();

        // 4. Vendas por data (exemplo: vendas do mês atual)
        $vendasPorData = Venda::whereMonth('created_at', now()->month)
            ->groupBy('created_at')
            ->selectRaw('date(created_at) as date, count(*) as total')
            ->get();


        // Produtos mais vendidos ( + quantidade )
        $produtosMaisVendidos = Produto::withCount('vendas')
            ->orderByDesc('vendas_count')
            ->take(5)
            ->get();

        // Produtos menos vendidos ( - quantidade )
        $produtosMenosVendidos = Produto::withCount('vendas')
            ->orderBy('vendas_count')
            ->take(5)
            ->get();

        return view('admin.relatorios.index', compact(
            'totalUsuarios',
            'totalVendas',
            'vendasPorData',
            'produtosMaisVendidos',
            'produtosMenosVendidos'
        ));
    }
}
