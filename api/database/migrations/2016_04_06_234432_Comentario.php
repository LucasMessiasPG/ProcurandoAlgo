<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $t) {
            $t->increments('id_comentario');
            $t->string('nome');
            $t->string('comentario');
            $t->integer('id_produto')->unsigner();
            $t->foreign('id_produto')->references('id_produto')->on('produtos');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comentarios');
    }
}
