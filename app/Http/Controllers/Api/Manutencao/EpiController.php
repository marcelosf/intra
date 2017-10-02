<?php

namespace Intranet\Http\Controllers\Api\Manutencao;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Model\Manutencao\Epi;

class EpiController extends Controller
{

    protected $epi;

    public function __construct(Epi $epi)
    {

        $this->epi = $epi;

    }

    public function index()
    {

        $epis = $this->epi->all()->pluck('equipamento');

        return compact('epis');

    }

}
