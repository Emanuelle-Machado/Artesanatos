
@extends('layouts.app-component')

@section('content')
    <h1 style="font-size: 2.2rem; color: #343a40; margin-bottom: 25px; font-weight: bold; letter-spacing: 1px;">Editar Venda</h1>
    <form method="POST" action="/admin/vendas/{{ $venda->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select id="user_id" name="user_id" class="form-select" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $venda->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select id="produto_id" name="produto_id" class="form-select" required>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}" {{ $produto->id == $venda->produto_id ? 'selected' : '' }}>
                        {{ $produto->nome }} - ${{ $produto->preco }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" value="{{ $venda->quantidade }}" required>
        </div>
        <div class="mb-3">
            <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
            <select id="forma_pagamento" name="forma_pagamento" class="form-select" required>
                <option value="cartao_credito" {{ $venda->forma_pagamento == 'cartao_credito' ? 'selected' : '' }}>Cartão de Crédito</option>
                <option value="boleto_bancario" {{ $venda->forma_pagamento == 'boleto_bancario' ? 'selected' : '' }}>Boleto Bancário</option>
                <option value="pix" {{ $venda->forma_pagamento == 'pix' ? 'selected' : '' }}>Pix</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Venda</button>
    </form>
@endsection
