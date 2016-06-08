<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissaos', function (Blueprint $t) {
            $t->increments('id_permissao');
            $t->string('descricao');
            $t->timestamps();
        });
        Schema::table('usuarios', function (Blueprint $t) {
            $t->foreign('id_permissao')->references('id_permissao')->on('permissaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissaos');
    }
}
