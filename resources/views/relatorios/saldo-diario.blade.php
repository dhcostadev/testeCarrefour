@extends('templates.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-info bg-dark p-3 text-monospace">
                    <h1>
                        Saldo Diário Consolidado
                    </h1>
                    <div class="">
                        <a href="{{ route('lancamentos.index') }}">
                            <button class="btn btn-dark" name="button">Voltar</button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (array_keys($saldoDiarioConsolidado) as $data)
                            <tr>
                                <td>{{ $data }}</td>
                                <td>{{ $saldoDiarioConsolidado[$data] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
