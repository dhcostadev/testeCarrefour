@extends('templates.template')


@section('content')
    <h1 class="text-center text-info bg-dark p-3 text-monospace">
        @if(isset($lancamento))
            Edição dos Dados
        @else
            Cadastro dos Dados
        @endif
    </h1>

    <div class="col-8 mx-auto mt-4">
        @if(isset($errors) && count($errors) > 0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif

        @if(isset($lancamento))
            <form id="form-editar" name="form-editar" action="{{ route('lancamentos.update', $lancamento->id) }}" method="post">
                @method('PUT')
        @else
            <form id="form-cadastro" name="form-cadastro" action="{{ route('lancamentos.store') }}" method="POST">
        @endif
            @csrf
            <input class="form-control mb-3" type="text" name="valor" value="{{ $lancamento->valor ?? '' }}" id="valor" placeholder="Valor" required>
            <input class="form-control mb-3" type="text" name="descricao" value="{{ $lancamento->descricao ?? '' }}" id="descricao" placeholder="Descrição" required>
            <input class="form-control mb-3" type="date" name="data" value="{{ $lancamento->data ?? '' }}" id="data" placeholder="Data" required>
            <input class="form-control mb-3" type="text" name="tipo" value="{{ $lancamento->tipo ?? '' }}" id="tipo" placeholder="Tipo" required>
            <select class="form-control mb-3" name="user_id" id="user_id" required>
                @if(isset($lancamento))
                    <option value="{{ $lancamento->user->id }}">{{ $lancamento->user->name }}</option>
                @endif
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
            <input class="btn btn-primary" type="submit" value="@if(isset($lancamento)) Atualizar @else Cadastrar @endif">
        </form>
        <div class="mt-4">
            <a href="{{ route('lancamentos.index') }}">
                <button class="btn btn-dark" name="button">Voltar</button>
            </a>
        </div>
    </div>
@endsection
