
@extends('layouts.app-component')

@section('content')
    <h1>Adicionar nova Venda</h1>
    <form method="POST" action="/admin/vendas">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select id="user_id" name="user_id" class="form-select" required>
                <option value="">Selecione um usuário</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select id="produto_id" name="produto_id" class="form-select" required>
                <option value="">Selecione um Produto</option>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }} - ${{ $produto->preco }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
            <select id="forma_pagamento" name="forma_pagamento" class="form-select" required>
                <option value="cartao_credito">Cartão de Crédito</option>
                <option value="boleto_bancario">Boleto Bancário</option>
                <option value="pix">Pix</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Venda</button>
    </form>
@endsection
