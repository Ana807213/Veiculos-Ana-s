<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Marca;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Página inicial (vitrine pública)
     */
    public function index(Request $request)
    {
        // Monta a query com os relacionamentos
        $query = Veiculo::with(['marca', 'modelo', 'cor']);

        // 🔹 Aplica filtro por marca, se o usuário escolher uma
        if ($request->filled('marca')) {
            $query->whereHas('marca', function ($q) use ($request) {
                $q->where('nome', $request->marca);
            });
        }

        // Executa a consulta
        $veiculos = $query->get();

        // 🔹 Carrega todas as marcas para o menu lateral
        $marcas = Marca::all();

        // 🔹 View: resources/views/template_area_publica/publica.blade.php
        return view('template_area_publica.publica', compact('veiculos', 'marcas'));
    }

    /**
     * Página de detalhes de um veículo
     */
    public function show($id)
    {
        // Carrega o veículo com suas relações
        $veiculo = Veiculo::with(['marca', 'modelo', 'cor'])->findOrFail($id);

        // 🔹 View: resources/views/template_area_publica/detalhes.blade.php
        return view('template_area_publica.detalhes', compact('veiculo'));
    }
}
