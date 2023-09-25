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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('endereco')->nullable()->default(null);
            $table->string('cidade')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);
            $table->string('cep')->nullable()->default(null);
            $table->string('pais')->nullable()->default(null);
            $table->string('foto')->nullable()->default("default.jpg");
            $table->string('reset_code')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::drop('Users');
    }
};
