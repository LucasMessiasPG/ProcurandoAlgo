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
        /*factory(\App\Models\Departamento::class, 30)->create();
        factory(App\Models\Produto::class, 100)->create();
        factory(App\Models\Cliente::class, 100)->create();
        factory(App\Models\Comentario::class, 400)->create();
        factory(\App\Models\ProdutoDepartamento::class, 400)->create();*/

        \App\Models\Status::create([
            'id_status' => 0,
            'descricao' => 'Transação Aprovada'
        ]);

        \App\Models\Status::create([
            'id_status' => 51,
            'descricao' => 'Estabelecimento inválido'
        ]);

        \App\Models\Status::create([
            'id_status' => 53,
            'descricao' => 'Transação não permitida para o emissor. Entre em contato com a Rede.'
        ]);

        \App\Models\Status::create([
            'id_status' => 56,
            'descricao' => 'Erro nos dados informados. Tente novamente.'
        ]);

        \App\Models\Status::create([
            'id_status' => 57,
            'descricao' => 'Estabelecimento inválido.'
        ]);

        \App\Models\Status::create([
            'id_status' => 58,
            'descricao' => 'Transação não autorizada. Contate o emissor'
        ]);

        \App\Models\Status::create([
            'id_status' => 69,
            'descricao' => 'Transação não permitida para este produto ou serviço.'
        ]);

        \App\Models\Status::create([
            'id_status' => 72,
            'descricao' => 'Contate o emissor.'
        ]);

        \App\Models\Status::create([
            'id_status' => 74,
            'descricao' => 'Falha na comunicação. Tente novamente.'
        ]);

        \App\Models\Status::create([
            'id_status' => 79,
            'descricao' => 'Cartão expirado. Transação não pode ser resubmetida. Contate o emissor.'
        ]);

        \App\Models\Status::create([
            'id_status' => 80,
            'descricao' => 'Transação não autorizada. Contate o emissor. (Saldo Insuficiente)'
        ]);

        \App\Models\Status::create([
            'id_status' => 81,
            'descricao' => 'Produto ou Serviço não habilitado para o emissor (AVS).'
        ]);

        \App\Models\Status::create([
            'id_status' => 83,
            'descricao' => 'Transação não autorizada para cartão de débito.'
        ]);

        \App\Models\Status::create([
            'id_status' => 84,
            'descricao' => 'Transação não autorizada. Transação não pode ser resubmetida. Contate o emissor.'
        ]);
    }
}
