<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->bigIncrements('idInstituicao');
            $table->bigInteger('idUsuario')->unsigned();
            $table->string('razao', 150);
            $table->string('fantasia', 150);
            $table->string('cpf', 11)->nullable();
            $table->string('cnpj', 14)->nullable();

            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
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
        Schema::dropIfExists('instituicoes');
    }
}
