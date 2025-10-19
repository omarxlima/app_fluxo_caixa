<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->nullable()->constrained('pessoas')->onDelete('set null');
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('set null');
            $table->enum('tipo', ['pagar', 'receber']);
            $table->string('descricao');
            $table->decimal('valor', 15, 2);
            $table->date('data_vencimento');
            $table->date('data_emissao')->nullable();
            $table->decimal('valor_pago', 15, 2)->nullable();
            $table->date('data_pagamento')->nullable();
            $table->string('status')->default('pendente'); // pendente | pago | cancelado
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contas');
    }
};
