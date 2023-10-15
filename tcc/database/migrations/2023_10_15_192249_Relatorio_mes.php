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
        Schema::create('Relatorio_mensal', function (Blueprint $table) {
        $table->string('mes');
        $table->string('ano');
        $table->decimal('saldo');
        $table->decimal('entrada');
        $table->decimal('saida');
        $table->decimal('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Relatorio_mensal');
    }
};
