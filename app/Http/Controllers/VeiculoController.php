<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cor;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::with(['marca', 'modelo', 'cor'])->get();
        return view('admin.veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $cores = Cor::all();

        return view('admin.veiculos.create', compact('marcas', 'modelos', 'cores'));
    }

    public function store(Request $request)
    {
        // 🔹 Normaliza o valor do preço antes da validação (aceita "50.000,00" ou "50000")
        $request->merge([
            'preco' => str_replace(['.', ','], ['', '.'], $request->preco),
        ]);

        $validated = $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'cor_id' => 'required|exists:cores,id',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string|max:1000',

            // ✅ Exigir as três fotos (links)
            'foto1' => 'required|url',
            'foto2' => 'required|url',
            'foto3' => 'required|url',
        ], [
            'marca_id.required' => 'Selecione a marca.',
            'modelo_id.required' => 'Selecione o modelo.',
            'cor_id.required' => 'Selecione a cor.',
            'ano.required' => 'Informe o ano.',
            'preco.required' => 'Informe o preço do veículo.',
            'preco.numeric' => 'O campo preço deve ser um número válido.',
            'foto1.required' => 'A primeira foto é obrigatória.',
            'foto2.required' => 'A segunda foto é obrigatória.',
            'foto3.required' => 'A terceira foto é obrigatória.',
            'foto1.url' => 'A foto 1 deve ser uma URL válida.',
            'foto2.url' => 'A foto 2 deve ser uma URL válida.',
            'foto3.url' => 'A foto 3 deve ser uma URL válida.',
        ]);

        Veiculo::create($validated);

        return redirect()
            ->route('admin.veiculos.index')
            ->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $cores = Cor::all();

        return view('admin.veiculos.edit', compact('veiculo', 'marcas', 'modelos', 'cores'));
    }

    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);

        // 🔹 Normaliza o valor do preço antes da validação
        $request->merge([
            'preco' => str_replace(['.', ','], ['', '.'], $request->preco),
        ]);

        $validated = $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo_id' => 'required|exists:modelos,id',
            'cor_id' => 'required|exists:cores,id',
            'ano' => 'required|integer|min:1900|max:' . date('Y'),
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string|max:1000',
            'foto1' => 'required|url',
            'foto2' => 'required|url',
            'foto3' => 'required|url',
        ], [
            'preco.numeric' => 'O campo preço deve ser um número válido.',
        ]);

        $veiculo->update($validated);

        return redirect()
            ->route('admin.veiculos.index')
            ->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()
            ->route('admin.veiculos.index')
            ->with('success', 'Veículo excluído com sucesso!');
    }

    public function show($id)
    {
        $veiculo = Veiculo::with(['marca', 'modelo', 'cor'])->findOrFail($id);
        return view('admin.veiculos.show', compact('veiculo'));
    }
}
