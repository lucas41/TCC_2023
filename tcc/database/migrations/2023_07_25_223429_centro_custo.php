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
        Schema::create('CentroCusto', function (Blueprint $table) {
            $table->id();
            $table->string('Nome');
            $table->string('Tipo');
            $table->unsignedBigInteger('conta_bancaria_id'); // Chave estrangeira para o campo 'id' da tabela 'conta_bancaria'
            $table->timestamps();
            // Definindo a chave estrangeira
            $table->foreign('conta_bancaria_id')->references('id')->on('conta_bancaria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CentroCusto');
    }
};
