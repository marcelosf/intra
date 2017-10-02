<?php

namespace Intranet\Http\Controllers\Api\Manutencao;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Model\Manutencao\OS;

class OSController extends Controller
{

    protected $os;

    public function __construct(OS $os)
    {

        $this->os = $os;

    }

    public function index($service)
    {

        $oss = $this->os->with('solicitacao_id', '=', $service)->get();

        return compact('oss');

    }

    public function getEpis($os)
    {

        return $this->os->find($os)->epis->all();

    }

}
