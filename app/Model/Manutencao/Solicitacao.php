<?php

namespace Intranet\Model\Manutencao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Solicitacao extends Model
{

    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'solicitante_id',
        'responsavel_id',
        'local_id',
        'status',
    ];


    /**
     * Table associated with the model.
     *
     * @var string
     */
    protected $table = 'manutencao_solicitacoes';


    public function solicitante()
    {

        return $this->belongsTo('Schneider\OAuthUsp\app\Http\Model\OauthUsers');

    }


    public function local()
    {

        return $this->belongsTo('Intranet\Model\Local\Local');

    }


    public function oss()
    {

        return $this->hasMany('Intranet\Model\Manutencao\OS');

    }


    public function responsavel()
    {

        return $this->belongsTo('Schneider\OAuthUsp\app\Http\Model\OauthUsers');

    }


    public function setCodigoAttribute()
    {

        $lastCodigo = DB::table('manutencao_solicitacoes')->orderBy('id', 'desc')->first();

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


    public function getStatusFormattedAttribute()
    {

        $solicitacaoStatus = $this->getAttribute('status');

        $status = new Status();

        $statusFormatted = $status->getSolicitacaOptions()->get($solicitacaoStatus);

        return $statusFormatted;

    }


}
