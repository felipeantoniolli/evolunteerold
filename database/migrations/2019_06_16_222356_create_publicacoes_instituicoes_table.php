<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacoesInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacoes_instituicoes', function (Blueprint $table) {
            $table->bigInteger('idInstituicao')->unsigned();
            $table->bigInteger('idPublicacao')->unsigned();

            $table->foreign('idInstituicao')->references('idInstituicao')->on('instituicoes');
            $table->foreign('idPublicacao')->references('idPublicacao')->on('publicacoes');
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
        Schema::dropIfExists('publicacoes_instituicoes');
    }
}
