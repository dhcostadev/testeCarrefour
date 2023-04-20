<?php

namespace App\Http\Controllers;

use App\Http\Requests\LancamentoRequest;
use App\Models\Lancamento;
use App\Models\User;

class LancamentosController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $lancamentos = Lancamento::paginate(10);

        return view('lancamentos.index', compact('lancamentos', 'usuarios'));
    }

    public function create()
    {
        $usuarios = User::all();
        return view('lancamentos.create', compact('usuarios'));
    }

    public function store(LancamentoRequest $request)
    {
        $lancamento = new Lancamento();
        $lancamento->valor = $request->input('valor');
        $lancamento->descricao = $request->input('descricao');
        $lancamento->data = $request->input('data');
        $lancamento->tipo = $request->input('tipo');

        $usuario = User::find($request->input('user_id'));
        $lancamento->user()->associate($usuario);

        $lancamento->save();

        return redirect()->route('lancamentos.index');
    }

    public function show($id)
    {
        $lancamento = Lancamento::find($id);
        return view('lancamentos.show', compact('lancamento'));
    }

    public function edit($id)
    {
        $lancamento = Lancamento::find($id);
        $usuarios = User::all();

        return view('lancamentos.create', compact('lancamento','usuarios'));
    }

    public function update(LancamentoRequest $request, $id)
    {
        $lancamento = Lancamento::findOrFail($id);
        $lancamento->valor = $request->input('valor');
        $lancamento->descricao = $request->input('descricao');
        $lancamento->data = $request->input('data');
        $lancamento->tipo = $request->input('tipo');
        $lancamento->user_id = $request->input('user_id');
        $lancamento->save();

        return redirect()->route('lancamentos.index');
    }

    public function destroy($id)
    {
        $lancamento = Lancamento::find($id);
        $lancamento->delete();

        return redirect()->route('lancamentos.index');
    }
}
