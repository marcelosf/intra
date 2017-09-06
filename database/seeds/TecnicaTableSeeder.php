<?php

use Illuminate\Database\Seeder;

class TecnicaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\Intranet\Model\Manutencao\Tecnica::class, 5)->create();

    }
}
