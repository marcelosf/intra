<?php

use Illuminate\Database\Seeder;
use Intranet\Model\Manutencao\Solicitacao;

class SolicitacaoTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Solicitacao::class, 1)->create();

    }
}
