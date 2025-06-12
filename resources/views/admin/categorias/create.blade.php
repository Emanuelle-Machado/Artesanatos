@extends('layouts.app-component')

@section('content')
    <h1>Adicionar Categoria</h1>

    <form action="{{ route('admin.categorias.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao">
        
        <button type="submit">Salvar</button>
    </form>
@endsection
