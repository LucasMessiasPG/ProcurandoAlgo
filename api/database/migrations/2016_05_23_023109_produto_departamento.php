<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdutoDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_departamentos', function (Blueprint $t) {
            $t->increments('id_produto_departamento');
            $t->integer('id_produto')->unsigned();
            $t->integer('id_departamento')->unsigned();
            $t->timestamps();
        });

        Schema::table('produto_departamentos', function (Blueprint $t) {
            $t->foreign('id_produto')->references('id_produto')->on('produtos')->onDelete('cascade');
        });

        Schema::table('produto_departamentos', function (Blueprint $t) {
            $t->foreign('id_departamento')->references('id_departamento')->on('departamentos')->onDelete('cascade');
        });
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
