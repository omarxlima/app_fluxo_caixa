<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    /** @use HasFactory<\Database\Factories\PagamentoFactory> */
    use HasFactory;

    protected $table = 'pagamentos';
    
    protected $fillable = [
        'conta_id',
        'forma_pagamento_id',
        'valor',
        'data_pagamento',
        'comprovante'
    ];

    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }

    public function formaPagamento()
    {
        return $this->belongsTo(FormaPagamento::class);
    }
}
