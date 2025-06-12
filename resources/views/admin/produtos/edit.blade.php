@extends('layouts.app-component')

@section('content')
    <h1>Editar Produto</h1>

    <form action="{{ route('admin.produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $produto->nome }}">

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="{{ $produto->descricao }}">

        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco" value="{{ $produto->preco }}">

        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" id="categoria_id">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Salvar</button>
    </form>
@endsection
