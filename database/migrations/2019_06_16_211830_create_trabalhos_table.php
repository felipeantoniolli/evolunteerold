<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabalhos', function (Blueprint $table) {
            $table->bigIncrements('idTrabalho');
            $table->bigInteger('idInstituicao')->unsigned();
            $table->string('nome', 100);
            $table->string('conteudo', 500);
            $table->dateTime('dataCriacao');
            $table->dateTime('dataTrabalho');

            $table->foreign('idInstituicao')->references('idInstituicao')->on('instituicoes');
            $table->softDeletes();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabalhos');
    }
}
