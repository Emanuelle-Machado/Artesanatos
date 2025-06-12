<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $hoje = Carbon::today();

        $totalVendasHoje = Venda::whereDate('created_at', $hoje)->sum('valor_total');
        $totalProdutos = Produto::count();
        $totalUsuarios = User::count();

        $ultimoProduto = Produto::latest()->first();
        return view('dashboard', compact(
            'totalVendasHoje',
            'totalProdutos',
            'totalUsuarios',
            'ultimoProduto'
        ));
    }
}
