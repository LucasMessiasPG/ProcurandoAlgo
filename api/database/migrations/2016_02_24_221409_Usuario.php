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
            $t->string('login');
            $t->string('senha');
            $t->integer('id_permissao')->unsigned();
            $t->timestamps();
            $t->text('remember_token');
            $t->char('api_token', 60)->nullable()->after('remember_token');
        });

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
