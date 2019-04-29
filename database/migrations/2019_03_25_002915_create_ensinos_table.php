<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnsinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensinos', function (Blueprint $table) {
            $table->increments('idens');
            $table->integer('idvol')->unsigned();
            $table->string('nome', 150);
            $table->tinyInteger("tipo");
            $table->date("inicio");
            $table->date('conclusao');
            $table->boolean('concluido')->nullable();
            $table->text('obs', 500)->nullable();

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
        Schema::dropIfExists('ensinos');
    }
}
