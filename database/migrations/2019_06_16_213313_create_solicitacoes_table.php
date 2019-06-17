<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->bigIncrements('idSolicitacao');
            $table->bigInteger('idVoluntario')->unsigned();
            $table->bigInteger('idTrabalho')->unsigned();
            $table->string('mensagem', 200);
            $table->boolean('aprovado');
            $table->string('justificativa', 200);

            $table->foreign('idVoluntario')->references('idVoluntario')->on('voluntarios');
            $table->foreign('idTrabalho')->references('idTrabalho')->on('trabalhos');
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
        Schema::dropIfExists('solicitacoes');
    }
}
