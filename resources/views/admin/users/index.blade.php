<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
    <style>
        
    </style>
</head>

@extends('layouts.app-component')

@section('content')
    <h1>Lista de Usuários</h1>

    <!-- Filtros -->
    <form method="GET" action="{{ route('admin.users.index') }}" class="row mb-4">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome ou email" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
        </div>
        <div class="col-md-2">
            <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Filtrar</button>
        </div>
    </form>

    <!-- Tabela -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-info btn-sm">Ver</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nenhum usuário encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->withQueryString()->links() }}
@endsection
