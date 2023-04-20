@extends('templates.template')


@section('content')
    <h1 class="text-center text-info bg-dark p-3 text-monospace">Detalhes dos Dados</h1>

    <div class="col-8 mx-auto mt-4">
        <p class="text-monospace">
            <strong>Valor:</strong> R$ {{ $lancamento->valor }}
        </p>

        <p class="text-monospace">
            <strong>Descrição:</strong> {{ $lancamento->descricao }}
        </p>

        <p class="text-monospace">
            <strong>Data:</strong> {{ $lancamento->data }}
        </p>

        <p class="text-monospace">
            <strong>Tipo:</strong> {{ $lancamento->tipo }}
        </p>

        <p class="text-monospace">
            <strong>Usuário:</strong> {{ $lancamento->user->name }}
        </p>

        <p class="text-monospace">
            <strong>E-mail:</strong> {{ $lancamento->user->email }}
        </p>

        <div class="">
            <a href="{{ route('lancamentos.index') }}">
                <button class="btn btn-dark" name="button">Voltar</button>
            </a>
        </div>
    </div>
@endsection
