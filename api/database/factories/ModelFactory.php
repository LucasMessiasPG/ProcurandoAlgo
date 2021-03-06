<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Usuario::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'login' => $faker->userName,
        'senha' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'id_permissao' => '1'
    ];
});
$factory->define(App\Models\Cliente::class, function (Faker\Generator $faker) {
    return [
      'nome' => $faker->name,
      'login' => $faker->userName,
      'senha' => bcrypt(str_random(10)),
      'email' => $faker->unique()->email,
      'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Produto::class, function (Faker\Generator $faker) {
    return [
      'nome' => $faker->name,
      'valor_unitario' => $faker->randomFloat(2,100,1000),
      'id_marca' => $faker->numberBetween(1,30),
      'descricao' => $faker->text($faker->numberBetween(10,30)),
      'descricao_completa' => $faker->text($faker->numberBetween(100,255)),
      'recomendado' => $faker->boolean(10),
      'destaque' => $faker->boolean(20),
      'promocao' => $faker->boolean(10),
      'img' => $faker->imageUrl(60,60),
    ];
});
$factory->define(\App\Models\Departamento::class, function (Faker\Generator $faker) {
    return [
      'nome' => $faker->name,
      'id_departamento_pai' => null,
      'descricao' => $faker->text($faker->numberBetween(10,30)),
    ];
});
$factory->define(\App\Models\Comentario::class, function (Faker\Generator $faker) {
    return [
      'id_produto' => $faker->numberBetween(1,100),
      'comentario' => $faker->text($faker->numberBetween(10,30)),
      'rate' => $faker->numberBetween(1,5),
      'nome' => $faker->name,
    ];
});
$factory->define(\App\Models\ProdutoDepartamento::class, function (Faker\Generator $faker) {
    return [
      'id_produto' => $faker->numberBetween(1,100),
      'id_departamento' => $faker->numberBetween(1,30),
    ];
});