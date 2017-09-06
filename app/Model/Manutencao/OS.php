<?php

namespace Intranet\Model\Manutencao;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{

    /**
     * Mass assignment variables.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'solicitacao_id',
        'status',
        'gestor_id',
        'relatorio',
        'data_inicio',
        'data_termino',
        'tecnica_id',
    ];


    /**
     * Table associated with the model.
     *
     * @var string
     */
    protected $table = 'manutencao_os';


    /**
     * Get EPIs for OSs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function epis()
    {

        return $this->belongsToMany('Intranet\Model\Manutencao\Epi', 'manutencao_epis_oss', 'os_id', 'epi_id');

    }


    /**
     * Get the Solicitação that the Os belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Solicitacao()
    {

        return $this->belongsTo('Intranet\Model\Manutencao\Solicitacao');

    }


    /**
     * Get Técnica.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tecnica()
    {

        return $this->belongsTo('Intranet\Model\Manutencao\Tecnica');

    }


    /**
     * Get OS Tecnico.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tecnicos()
    {

        return $this->belongsToMany('Schneider\OAuthUsp\app\Model\OauthUser', 'manutencao_os_tecnico', 'tecnico_id', 'os_id');

    }

    /**
     * Get Gestor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gestor()
    {

        return $this->belongsTo('Schneider\OauthUsp\app\Http\Model\OauthUser');

    }


    /**
     * Get Codigo Formatted.
     *
     * @return string
     */
    public function getCodigoFormattedAttribute()
    {

        return $this->solicitacao->codigo . '|' . $this->codigo;

    }

    /**
     * Format entries for Os objects.
     */
    public function setCodigoAttribute()
    {

        $lastCodigo = DB::table('manutencao_os')->orderBy('id', 'desc')->first();

        $codigo = 1;

        if($lastCodigo)
        {

            $last = explode('/', $lastCodigo->codigo);

            if($last[1] == date('y'))
            {

                $codigo = $last[0] + 1;

            }

        }

        $this->attributes['codigo'] = $codigo . '/' . date('y');

    }


    /**
     * Return Status Formatted.
     *
     * @return mixed
     */
    public function getStatusFormattedAttribute()
    {

        $osStatus = $this->getAttribute('status');

        $status = new Status();

        $statusFormated = $status->getOsOptions()->get($osStatus);

        return $statusFormated;

    }

}
