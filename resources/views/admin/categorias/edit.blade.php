@extends('layouts.app-component')

@section('content')
    <h1>Editar Categoria</h1>

    <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $categoria->nome }}">

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="{{ $categoria->descricao }}">

        <button type="submit">Salvar</button>
    </form>
@endsection
