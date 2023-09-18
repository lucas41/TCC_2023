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
            $table->decimal('valplanejado')->default("0");
            $table->decimal('valatual')->default("0");
            $table->unsignedBigInteger('user_id'); // Chave estrangeira para o campo 'id' da tabela 'users'
            $table->timestamps();
            // Definindo a chave estrangeira
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
