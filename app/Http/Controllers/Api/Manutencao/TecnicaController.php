<?php

namespace Intranet\Http\Controllers\Api\Manutencao;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Model\Manutencao\Tecnica;

class TecnicaController extends Controller
{

    protected $tecnica;

    public function __construct(Tecnica $tecnica)
    {

        $this->tecnica = $tecnica;

    }

    public function index()
    {

        return $this->tecnica->all();

    }

}
