<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    /** @use HasFactory<\Database\Factories\FormaPagamentoFactory> */
    use HasFactory;

    protected $table = 'formas_pagamento';

    protected $fillable = ['nome', 'ativo'];

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }
}
