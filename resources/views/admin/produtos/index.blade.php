<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <style>
        
    </style>
</head>

@extends('layouts.app-component')

@section('content')
    <h1>Lista de Produtos</h1>
    <a href="{{ route('admin.produtos.create') }}">Adicionar Produtos</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ $produto->categoria->nome }}</td>
                    <td>
                        <a href="{{ route('admin.produtos.edit', $produto->id) }}">Editar</a>
                        <form action="{{ route('admin.produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
