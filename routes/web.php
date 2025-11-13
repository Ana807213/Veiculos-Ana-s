<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\PublicController;
use App\Models\Veiculo;

/*
|--------------------------------------------------------------------------
| Rotas da Área Administrativa
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // CRUDs principais
        Route::resource('marcas', MarcaController::class);
        Route::resource('modelos', ModeloController::class);
        Route::resource('cores', CorController::class);
        Route::resource('veiculos', VeiculoController::class);

        // Redirecionar "Gerenciar Produtos" → CRUD de veículos
        Route::get('/produtos', function () {
            return redirect()->route('admin.veiculos.index');
        })->name('produtos');
    });

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/veiculo/{id}', [PublicController::class, 'show'])->name('public.veiculo.show');

/*
|--------------------------------------------------------------------------
| Dashboard Padrão (Laravel Breeze)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Perfil do Usuário
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Rotas de Teste / Debug
|--------------------------------------------------------------------------
*/
Route::get('/teste-relacoes', function () {
    $veiculo = Veiculo::with(['marca', 'modelo', 'cor'])->first();
    return response()->json($veiculo);
});

/*
|--------------------------------------------------------------------------
| Rotas de Autenticação (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
