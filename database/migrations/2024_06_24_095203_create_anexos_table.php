<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('justificacao_despesa_id');
            $table->string('caminho');
            $table->timestamps();
    
            $table->foreign('justificacao_despesa_id')->references('id')->on('justificacao_despesas')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('anexos');
    }
    
}
