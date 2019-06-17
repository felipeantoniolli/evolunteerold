<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasAtuacoesVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas_atuacoes_voluntarios', function (Blueprint $table) {
            $table->bigInteger('idVoluntario')->unsigned();
            $table->bigInteger('idAreaAtuacao')->unsigned();

            $table->foreign('idVoluntario')->references('idVoluntario')->on('voluntarios');
            $table->foreign('idAreaAtuacao')->references('idAreaAtuacao')->on('areas_atuacoes');
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
        Schema::dropIfExists('areas_atuacoes_voluntarios');
    }
}
