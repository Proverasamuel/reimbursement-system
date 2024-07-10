<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Valor do departamento a ser atribuído
        $departamentoId = 1;

        Schema::create('departamentos', function (Blueprint $table) use ($departamentoId) {
            $table->id();
            $table->unsignedBigInteger('departamento')->default($departamentoId);
            $table->string('sigla', 10)->unique()->required();
            $table->integer('direccao')->default(0)->nullable(true);
            $table->unsignedBigInteger('coordenador')->nullable(true)->default(0);
            $table->unsignedBigInteger('chefe')->nullable(true)->default(0);
            $table->string('avatar', 100)->required();
            $table->foreign('coordenador')->references('id')->on('users');
            $table->foreign('chefe')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
