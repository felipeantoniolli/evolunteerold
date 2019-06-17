<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos_voluntarios', function (Blueprint $table) {
            $table->bigInteger('idVoluntario')->unsigned();
            $table->bigInteger('idContato')->unsigned();

            $table->foreign('idVoluntario')->references('idVoluntario')->on('voluntarios');
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
        Schema::dropIfExists('contatos_voluntarios');
    }
}
