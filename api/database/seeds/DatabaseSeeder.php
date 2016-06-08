<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        factory(App\Models\Usuario::class, 50)->create();
        factory(\App\Models\Departamento::class, 30)->create();
        factory(App\Models\Produto::class, 100)->create();
        factory(App\Models\Cliente::class, 100)->create();
        factory(App\Models\Comentario::class, 400)->create();
        factory(\App\Models\ProdutoDepartamento::class, 400)->create();
    }
}
