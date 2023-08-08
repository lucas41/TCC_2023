<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('conta_bancaria', function (Blueprint $table) {
            $table->id();
            $table->string('Nome_Conta');
            $table->string('Nome_banco');
            $table->string('Agencia');
            $table->string('Numero');
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
        Schema::dropIfExists('conta_bancaria');
    }
};
