<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Esse arquivo cria a tabela 'products' com os campos especificados para o banco de dados
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     * método responsável por definir as ações executadas ao executar a migração
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('quanty');
            $table->string('description');
            $table->string('category');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * método responsável por definir as ações executadas ao reverter a migração
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
