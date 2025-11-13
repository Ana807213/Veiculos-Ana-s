<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::orderBy('nome')->get();
        return view('admin.marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('admin.marcas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:marcas,nome',
        ]);

        Marca::create($request->all());

        return redirect()
            ->route('admin.marcas.index')
            ->with('success', 'Marca cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $marca = Marca::findOrFail($id);
        return view('admin.marcas.edit', compact('marca'));
    }

    public function update(Request $request, $id)
    {
        $marca = Marca::findOrFail($id);

        $request->validate([
            'nome' => 'required|unique:marcas,nome,' . $marca->id,
        ]);

        $marca->update($request->all());

        return redirect()
            ->route('admin.marcas.index')
            ->with('success', 'Marca atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();

        return redirect()
            ->route('admin.marcas.index')
            ->with('success', 'Marca excluída com sucesso!');
    }
}
