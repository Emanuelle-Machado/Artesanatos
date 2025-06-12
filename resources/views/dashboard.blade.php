
@extends('layouts.app-component')

@section('content')
    <h1>Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Vendas hoje</h5>
                    <p class="card-text" style="font-size: 1.3rem; font-weight: bold;">
                        R$ {{ number_format($totalVendasHoje, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Produtos cadastrados</h5>
                    <p class="card-text" style="font-size: 1.3rem; font-weight: bold;">
                        {{ $totalProdutos }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white" style="background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%); box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Usuários</h5>
                    <p class="card-text" style="font-size: 1.3rem; font-weight: bold;">
                        {{ $totalUsuarios }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
