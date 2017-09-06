<?php

namespace Intranet\Model\Ramais;

use Illuminate\Database\Eloquent\Model;

class Ramal extends Model
{

    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $fillable = ['numero', 'created_at', 'updated_at'];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ramais';


    /**
     * Get Salas from Ramal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function salas()
    {

        return $this->belongsToMany('Intranet\Model\Local\Local', 'local_salas_ramais', 'ramal_id', 'sala_id');

    }


    /**
     * Get a List of Sala IDs.
     *
     * @return mixed
     */
    public function getSalaListAttribute()
    {

        return $this->salas->pluck('id');

    }


}
