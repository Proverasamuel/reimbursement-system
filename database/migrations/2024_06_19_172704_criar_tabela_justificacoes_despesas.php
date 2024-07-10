<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaJustificacoesDespesas extends Migration
{
    public function up()
    {
        Schema::create('justificacao_despesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colaborador');
            $table->unsignedBigInteger('departamento');
            $table->unsignedBigInteger('mes');
            $table->unsignedBigInteger('ano');  
            $table->decimal('valor_total', 15, 2);
            $table->text('motivo');
            $table->string('tipoDespesa');
            $table->date('data');
            $table->integer('progress');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('justificacao_despesas');
    }
}
