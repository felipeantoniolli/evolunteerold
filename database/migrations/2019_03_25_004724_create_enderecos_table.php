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
            $table->string('cep', 8);
            $table->string('rua', 50);
            $table->string('complemento', 50);
            $table->string('cidade', 30);
            $table->string('estado', 2);

            $table->softDeletes();
            $table->timestamps();
            $table->foreign('idvol')->references('idvol')->on('voluntarios');

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
        Schema::dropIfExists('enderecos');
    }
}
