<?php

namespace Intranet\Model\Manutencao;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    /**
     * Get OS Status
     *
     * @return \Illuminate\Support\Collection
     */
    public function getOsOptions()
    {

        $status = collect([

            'autorizado'            =>  'Cancelado',
            'andamento'             =>  'Executado',
            'resolvido'             =>  'Em andamento',
            'cancelado'             =>  'Para autorização',
            'aguardando_info'       =>  'Em Elaboração',
            'aguardando_material'   =>  'Autorizado',

        ]);

        return $status;

    }


    /**
     * Get Solicitacao Status
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSolicitacaOptions()
    {

        $status = collect([

            'autorizacao'           =>  'Aguardando Autorização',
            'autorizado'            =>  'Autorizado',
            'andamento'             =>  'Em andamento',
            'elaboracao'            =>  'Em elaboração',
            'executado'             =>  'Executado',
            'cancelado'             =>  'Cancelado',
            'aguardando_info'       =>  'Aguardando Informação',
            'aguardando_material'   =>  'Aguardando material',

        ]);

        return $status;

    }

}
