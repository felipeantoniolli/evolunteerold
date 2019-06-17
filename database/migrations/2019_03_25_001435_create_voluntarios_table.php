<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->bigIncrements('idVoluntario');
            $table->bigInteger('idUsuario')->unsigned();
            $table->string('nome', 50);
            $table->string('sobrenome', 100);
            $table->string('cpf', 11);
            $table->string('rg', 9)->nullable();
            $table->date('data_nasc');
            $table->tinyInteger('genero');

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
        Schema::dropIfExists('voluntarios');
    }
}
