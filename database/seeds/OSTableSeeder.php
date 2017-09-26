<?php

use Illuminate\Database\Seeder;

class OSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\Intranet\Model\Manutencao\OS::class, 50)->create();

    }
}
