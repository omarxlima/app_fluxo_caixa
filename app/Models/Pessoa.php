<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    /** @use HasFactory<\Database\Factories\PessoaFactory> */
    use HasFactory;

    protected $table = 'pessoas';

    protected $fillable = [
        'nome', 'tipo', 'documento', 'email', 'telefone', 'endereco',
    ];

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }
}
