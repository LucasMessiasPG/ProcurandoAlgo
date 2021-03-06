<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $t) {
            $t->increments('id_produto');
            $t->string('nome');
            $t->string('descricao');
            $t->string('descricao_completa');
            $t->string('img');
            $t->boolean('destaque');
            $t->boolean('recomendado');
            $t->boolean('promocao');
            $t->float('valor_unitario',10,2);
            $t->integer('id_marca')->unsigner();
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
        Schema::drop('produtos');
    }
}
