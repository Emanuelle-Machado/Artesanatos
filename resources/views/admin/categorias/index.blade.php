<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Categorias</title>
    <style>
        
    </style>
</head>

@extends('layouts.app-component')

@section('content')
<body>
    <h1>Lista de Categorias</h1>
    <a href="{{ route('admin.categorias.create') }}">Adicionar Categorias</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->descricao }}</td>
                    <td>
                        <a href="{{ route('admin.categorias.edit', $categoria->id) }}">Editar</a>
                        <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </body>
@endsection

</html>