<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Departamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $t) {
            $t->increments('id_departamento');
            $t->integer('id_departamento_pai')->nullable()->unsigned();
            $t->string('nome');
            $t->string('descricao');
            $t->timestamps();
        });

        Schema::table('departamentos', function (Blueprint $t) {
            $t->foreign('id_departamento_pai')->references('id_departamento')->on('departamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departamentos');
    }
}
