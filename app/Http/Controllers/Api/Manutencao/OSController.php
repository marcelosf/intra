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

    public function store(Request $request)
    {

        $os = $this->os->create($request->all());

        $this->attachEpis($request, $os);

        $this->attachTecnicos($request, $os);

    }

    public function update(Request $request, $os)
    {

        $os = $this->os->find($os);

        $os->update($request->all());

        $os->tecnicos()->sync($request->tecnicos);

        $os->epis()->sync($request->epis);

    }

    public function getEpis($os)
    {

        return $this->os->find($os)->epis->all();

    }

    public function getTecnicos($os)
    {

        $tecnicos = $this->os->find($os)->tecnicos;

        return compact('tecnicos');

    }

    protected function attachEpis(Request $request, $os)
    {

        $epis = $request->epis;

        foreach ($epis as $epi) {

            $os->epis()->attach($epi);

        }

    }

    protected function attachTecnicos(Request $request, $os)
    {

        $tecnicos = $request->tecnicos;

        foreach($tecnicos as $tecnico) {

            $os->tecnicos()->attach($tecnico);

        }

    }

}
