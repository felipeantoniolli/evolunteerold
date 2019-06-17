<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos_instituicoes', function (Blueprint $table) {
            $table->bigInteger('idInstituicao')->unsigned();
            $table->bigInteger('idContato')->unsigned();

            $table->foreign('idInstituicao')->references('idInstituicao')->on('instituicoes');
            $table->foreign('idContato')->references('idContato')->on('contatos');
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
        Schema::dropIfExists('contatos_instituicoes');
    }
}
