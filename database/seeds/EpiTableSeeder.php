<?php

use Illuminate\Database\Seeder;

class EpiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Intranet\Model\Manutencao\Epi::class, 5)->create();

    }
}
