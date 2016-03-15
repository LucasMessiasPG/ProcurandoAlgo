<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carrinho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $t) {
            $t->increments('id_carrinho');
            $t->integer('id_produto')->unsigned();
            $t->integer('id_usuario')->unsigned();
            $t->timestamp('data_expeira');
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
        Schema::drop('carrinhos');
    }
}
