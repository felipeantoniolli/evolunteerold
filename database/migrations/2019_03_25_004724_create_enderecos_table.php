<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('idend');
            $table->integer('idvol')->unsigned();
            $table->integer('cep', 8);
            $table->string('rua', 50);
            $table->string('complemento', 50);
            $table->string('cidade', 30);
            $table->string('estado', 2);
            $table->foreign('idvol')->references('idvol')->on('voluntarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
