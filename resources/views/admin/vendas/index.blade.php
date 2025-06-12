<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vendas</title>
    <style>
        
    </style>
</head>

@extends('layouts.app-component')

@section('content')
    <h1 style="font-size: 2.2rem; color: #343a40; margin-bottom: 25px; font-weight: bold; letter-spacing: 1px;">Lista de Vendas</h1>
    <a href="/admin/vendas/create" class="btn btn-success mb-3" style="padding: 10px 20px; background-color: #28a745; color: #fff; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block; margin-bottom: 20px;">Adicionar Nova Venda</a>
    <table class="table table-bordered" style="width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th style="padding: 12px; border: 1px solid #dee2e6;">ID</th>
                <th style="padding: 12px; border: 1px solid #dee2e6;">Usuário</th>
                <th style="padding: 12px; border: 1px solid #dee2e6;">Produto</th>
                <th style="padding: 12px; border: 1px solid #dee2e6;">Quantidade</th>
                <th style="padding: 12px; border: 1px solid #dee2e6;">Forma de pagamento</th>
                <th style="padding: 12px; border: 1px solid #dee2e6;">Preço Total</th>
                <th style="padding: 12px; border: 1px solid #dee2e6;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
                <tr>
                    <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $venda->id }}</td>
                    <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $venda->user->name }}</td>
                    <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $venda->produto->nome }}</td>
                    <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $venda->quantidade }}</td>
                    <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $venda->forma_pagamento }}</td>
                    <td style="padding: 10px; border: 1px solid #dee2e6;">R$ {{ number_format($venda->valor_total, 2, ',', '.') }}</td>
                    <td style="padding: 10px; border: 1px solid #dee2e6;">
                        <a href="/admin/vendas/{{ $venda->id }}/edit" class="btn btn-warning btn-sm" style="margin-right: 5px;">Editar</a>
                        <form action="/admin/vendas/{{ $venda->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button 
                                class="btn btn-danger btn-sm" 
                                onclick="return confirm('Tem certeza que deseja excluir?')" 
                                style="
                                    margin-left: 2px; 
                                    background-color: #dc3545; 
                                    color: #fff; 
                                    border: none; 
                                    border-radius: 4px; 
                                    padding: 6px 14px; 
                                    font-weight: bold; 
                                    cursor: pointer; 
                                    transition: background 0.2s;
                                "
                                onmouseover="this.style.backgroundColor='#c82333';"
                                onmouseout="this.style.backgroundColor='#dc3545';"
                            >
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
