<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $t) {
            $t->foreign('id_permissao')->references('id_permissao')->on('permissaos');
        });
        Schema::table('logs', function (Blueprint $t) {
            $t->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
        Schema::table('departamentos', function (Blueprint $t) {
            $t->foreign('id_departamento_pai')->references('id_departamento')->on('departamentos');
        });
        Schema::table('pedidos', function (Blueprint $t) {
            $t->foreign('id_carrinho')->references('id_carrinho')->on('carrinhos');
            $t->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
        Schema::table('carrinhos', function (Blueprint $t) {
            $t->foreign('id_produto')->references('id_produto')->on('produtos');
            $t->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
        /*
        Schema::table('produtos', function (Blueprint $t) {
            $t->foreign('id_marca')->references('id_marca')->on('marca');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
