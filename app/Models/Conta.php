<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    /** @use HasFactory<\Database\Factories\ContaFactory> */
    use HasFactory;

    protected $table = 'contas';

    protected $fillable = [
        'pessoa_id',
        'categoria_id',
        'tipo',
        'descricao',
        'valor',
        'data_vencimento',
        'data_emissao',
        'valor_pago',
        'data_pagamento',
        'status',
        'observacoes'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }

    public function getSaldoAttribute()
    {
        return $this->valor - ($this->valor_pago ?? 0);
    }
}
