<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $t) {
            $t->increments('id_pedido');
            $t->integer('id_carrinho')->unsigned();
            $t->timestamp('data_vencimento');
            $t->timestamp('data_pagamento')->nullable();
            $t->integer('forma_pagamento');
            $t->integer('status_pagamento')->default(0);
            $t->integer('id_usuario')->unsigned();
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
        Schema::drop('pedidos');
    }
}
