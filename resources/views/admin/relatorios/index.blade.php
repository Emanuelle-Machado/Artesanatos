

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatórios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
@extends('layouts.app-component')

@section('content')
<body>
    <h1>Relatórios</h1>

    <h2>Total de Usuários</h2>
    <p>Total de usuários cadastrados: <strong>{{ $totalUsuarios }}</strong></p>

    <h2>Total de Vendas</h2>
    <p>Total de vendas realizadas: <strong>{{ $totalVendas }}</strong></p>

    <h2>Produtos com Mais Vendas</h2>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Total de Produtos vendidos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtosMaisVendidos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->vendas_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Produtos menos vendidos</h2>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Total de Produtos vendidos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtosMenosVendidos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->vendas_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Vendas por Data (Mês Atual)</h2>
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Total de Vendas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendasPorData as $data)
            <tr>
                <td>{{ $data->date }}</td>
                <td>{{ $data->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection
</html>