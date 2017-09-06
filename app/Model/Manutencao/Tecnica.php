<?php

namespace Intranet\Model\Manutencao;

use Illuminate\Database\Eloquent\Model;

class Tecnica extends Model
{

    protected $fillable = [

        'nome'

    ];


    public $table = 'manutencao_tecnicas';


    /**
     * Get OSs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oss()
    {

        return $this->hasMany('Intranet\Model\Manutencao\OS');

    }

}
