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


//        Schema::table('pedidos', function (Blueprint $t) {
//            $t->foreign('id_carrinho')->references('id_carrinho')->on('carrinhos')->onDelete('cascade');
//        });
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
