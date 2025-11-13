<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Veiculo extends Model
{
    use HasFactory;

    protected $table = 'veiculos';

    protected $fillable = [
        'marca_id',
        'modelo_id',
        'cor_id',
        'ano',
        'preco',
        'descricao',
        'foto1',
        'foto2',
        'foto3',
    ];

    // use decimal para evitar imprecisão de float
    protected $casts = [
        'preco' => 'decimal:2', // retorna string como "50000.00"
        'ano'   => 'integer',
    ];

    /* ========= Atributos com get/set moderno (Laravel 9+) ========= */

    /**
     * Normaliza o preço ao salvar (aceita "50.000,00" ou "50000.00")
     * e entrega o valor "cru" no get (ex.: "50000.00").
     */
    protected function preco(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                if (is_string($value)) {
                    // remove "R$", espaços e separadores de milhar
                    $value = str_replace(['R$', ' ', '.'], '', $value);
                    // vírgula decimal -> ponto
                    $value = str_replace(',', '.', $value);
                }
                return $value === '' || $value === null ? 0 : $value;
            }
        );
    }

    /**
     * Atributo só de leitura para exibir formatado no Brasil.
     * Uso no Blade: {{ $veiculo->preco_formatado }}
     */
    protected function precoFormatado(): Attribute
    {
        return Attribute::make(
            get: function () {
                $valor = $this->attributes['preco'] ?? 0; // string "50000.00" ou null
                return 'R$ ' . number_format((float)$valor, 2, ',', '.');
            }
        );
    }

    /* ============================ Relações ============================ */

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class);
    }
}
