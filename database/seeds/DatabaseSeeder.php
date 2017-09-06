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

        $this->call(LocalTableSeeder::class);
        $this->call(OauthUserTableSeeder::class);
        $this->call(EpiTableSeeder::class);
        $this->call(SolicitacaoTableseeder::class);
        $this->call(TecnicaTableSeeder::class);

    }
}
