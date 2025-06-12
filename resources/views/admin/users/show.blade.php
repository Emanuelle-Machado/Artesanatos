@extends('layouts.app-component')

@section('content')
    <h2>Detalhes do Usuário</h2>

    <ul>
        <li><strong>Nome:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Data de Cadastro:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</li>
    </ul>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
