@extends('templates.template')

@section('content')
    <h1 class="text-center text-info bg-dark p-3 text-monospace">DESAFIO - [ Fluxo de Caixa ] </h1>

    <div class="text-center mb-4 mt-4">
        <a href="{{ route('lancamentos.create') }}">
            <button class="btn btn-lg btn-info" name="button">Cadastrar</button>
        </a>
        <a href="{{ route('relatorio.saldo-diario-consolidado') }}">
            <button class="btn btn-lg btn-warning" name="button">Relatório</button>
        </a>
    </div>
    <div class="col-8 mx-auto">
        @csrf
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">DATA</th>
                    <th scope="col">TIPO</th>
                    <th scope="col">USUÁRIO</th>
                    <th scope="col">AÇÃO</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lancamentos as $lancamento)
            <tr>
                <td scope="row">{{ $lancamento->id }}</td>
                <td>R$ {{ $lancamento->valor }}</td>
                <td>{{ $lancamento->descricao }}</td>
                <td>{{ $lancamento->data }}</td>
                <td>{{ $lancamento->tipo }}</td>
                <td>{{ $lancamento->user->name }}</td>
                <td class="w-25 d-flex">
                    <a href="{{ route('lancamentos.show', $lancamento->id) }}" class="pr-1">
                        <button class="btn btn-dark" name="button">Visualizar</button>
                    </a>
                    <a href="{{ route('lancamentos.edit', $lancamento->id) }}" class="mr-1">
                        <button class="btn btn-primary" name="button">Editar</button>
                    </a>
                    <form action="{{ route('lancamentos.destroy', $lancamento->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja excluir os dados?')">Deletar</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="py-4">
            {{ $lancamentos->links() }}
        </div>
    </div>
@endsection
