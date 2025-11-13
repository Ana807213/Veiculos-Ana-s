<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Página inicial do painel administrativo
     */
    public function index()
    {
        // View: resources/views/template_area_admin/dashboard.blade.php
        return view('admin.dashboard');

    }

    /**
     * Página de gerenciamento de produtos (veículos)
     */
    public function produtos()
    {
        // View: resources/views/template_area_admin/produtos.blade.php
        return view('template_area_admin.produtos');
    }
}
