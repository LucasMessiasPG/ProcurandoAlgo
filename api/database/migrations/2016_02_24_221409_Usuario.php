<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $t) {
            $t->increments('id_usuario');
            $t->string('nome');
            $t->string('senha');
            $t->string('email');
            $t->integer('id_permissao')->unsigned();
            $t->string('remember_token')->nullable();
            $t->string('api_token', 60)->nullable()->after('remember_token');
            $t->timestamps();
        });
//        Schema::table('pedidos', function (Blueprint $t) {
//            $t->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
