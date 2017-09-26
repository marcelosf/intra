<?php

namespace Intranet\Http\Controllers\Manutencao;

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

}
