<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('idUsuario');
            $table->string('email', 50)->unique();
            $table->string('usuario', 25)->unique();
            $table->string("senha");
            $table->tinyInteger('tipo');
            $table->boolean('ativo');
            $table->timestamp('email_verified_at')->nullable();

            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
