<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    public function index()
    {
        $cores = Cor::orderBy('nome')->get();
        return view('admin.cores.index', compact('cores'));
    }

    public function create()
    {
        return view('admin.cores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:cores,nome',
        ]);

        Cor::create($request->all());

        return redirect()
            ->route('admin.cores.index')
            ->with('success', 'Cor cadastrada com sucesso!');
    }

    public function edit(Cor $core)
    {
        return view('admin.cores.edit', [
            'cor' => $core
        ]);
    }

    public function update(Request $request, Cor $core)
    {
        $request->validate([
            'nome' => 'required|unique:cores,nome,' . $core->id,
        ]);

        $core->update($request->all());

        return redirect()
            ->route('admin.cores.index')
            ->with('success', 'Cor atualizada com sucesso!');
    }

    public function destroy(Cor $core)
    {
        $core->delete();

        return redirect()
            ->route('admin.cores.index')
            ->with('success', 'Cor excluída com sucesso!');
    }
}
