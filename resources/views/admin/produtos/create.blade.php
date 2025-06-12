@extends('layouts.app-component')

@section('content')
    <h1>Adicionar Produto</h1>

    <form action="{{ route('admin.produtos.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao">

        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco">

        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" id="categoria_id">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>

        <button type="submit">Salvar</button>
    </form>
@endsection
