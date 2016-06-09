<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PedidoProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produto', function (Blueprint $t) {
            $t->increments('id_pedido_produto');
            $t->integer('id_produto')->unsigned();
            $t->integer('id_pedido')->unsigned();
            $t->timestamps();
        });

        Schema::table('pedido_produto', function (Blueprint $t) {
            $t->foreign('id_produto')->references('id_produto')->on('produtos')->onDelete('cascade');
            $t->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedido_produto');
    }
}
