<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaItensDespesas extends Migration
{
    public function up()
    {
        Schema::create('item_despesas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('justificacao_despesa_id')->constrained('justificacao_despesas')->onDelete('cascade');
            $table->string('descricao');
            $table->decimal('valor', 15, 2);
            $table->string('caminhoFicheiro')->nullable();
            $table->string('caminhoImagem')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_despesas');
    }
}
