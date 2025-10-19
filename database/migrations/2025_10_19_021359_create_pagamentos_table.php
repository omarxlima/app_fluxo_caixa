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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conta_id')->constrained('contas')->onDelete('cascade');
            $table->foreignId('forma_pagamento_id')->nullable()->constrained('formas_pagamento')->onDelete('set null');
            $table->decimal('valor', 15, 2);
            $table->date('data_pagamento');
            $table->string('comprovante')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
