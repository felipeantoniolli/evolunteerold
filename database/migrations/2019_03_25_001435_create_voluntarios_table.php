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
            $table->increments('idvol');
            $table->string('usuario', 50);
            $table->string('nome', 150);
            $table->string('senha', 50);
            $table->string('email', 50);
            $table->string('cpf', 11);
            $table->string('rg', 9)->nullable();
            $table->date('data_nasc');
            $table->boolean('genero')->nullable();
            $table->boolean('ativo');

            $table->softDeletes();
            $table->timestamps();
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
