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

        factory(App\Models\Usuario::class, 50)->create();
        factory(App\Models\Cliente::class, 5000)->create();
    }
}
