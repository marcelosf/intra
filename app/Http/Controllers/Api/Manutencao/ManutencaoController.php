<?php

namespace Intranet\Http\Controllers\Api\Manutencao;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Model\Manutencao\Solicitacao;

class ManutencaoController extends Controller
{

    protected $solicitacao;

    public function __construct(Solicitacao $solicitacao)
    {

        $this->solicitacao = $solicitacao;

    }


    /**
     * List of Solicitacoes.
     *
     * @return array
     */
    public function index()
    {

        $solicitacoes = $this->solicitacao->with('responsavel', 'solicitante')->get();

        return compact('solicitacoes');

    }




    public function show($id)
    {

        $solicitacao = $this->solicitacao->with('responsavel', 'solicitante')->find($id);

        return compact('solicitacao');

    }


    public function store(Request $request)
    {

        $this->solicitacao->create($request->all());

    }

}
