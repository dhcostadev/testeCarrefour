<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lancamento;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function saldoDiarioConsolidado()
    {
        $dataInicial = Carbon::now()->startOfMonth();
        $dataFinal = Carbon::now()->endOfMonth();

        $lancamentos = Lancamento::selectRaw('DATE(created_at) as data, SUM(valor) as total')
            ->whereBetween('created_at', [$dataInicial, $dataFinal])
            ->groupBy('data')
            ->get();

        $saldoDiarioConsolidado = [];

        $data = $dataInicial->copy();
        while ($data <= $dataFinal) {
            $saldoDiarioConsolidado[$data->format('d/m/Y')] = 0;
            $data = $data->addDay();
        }

        foreach ($lancamentos as $lancamento) {
            $data = Carbon::parse($lancamento->data);
            $saldoDiarioConsolidado[$data->format('d/m/Y')] = $lancamento->total;
        }

        return view('relatorios.saldo-diario', [
            'saldoDiarioConsolidado' => $saldoDiarioConsolidado,
        ]);
    }
}
