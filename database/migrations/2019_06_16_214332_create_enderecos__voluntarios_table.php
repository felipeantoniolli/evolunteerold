<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos_voluntarios', function (Blueprint $table) {
            $table->bigInteger('idVoluntario')->unsigned();
            $table->bigInteger('idEndereco')->unsigned();

            $table->foreign('idVoluntario')->references('idVoluntario')->on('voluntarios');
            $table->foreign('idEndereco')->references('idEndereco')->on('enderecos');
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
        Schema::dropIfExists('enderecos_voluntarios');
    }
}
