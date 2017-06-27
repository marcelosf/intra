<?php

namespace Intranet\Model\Local;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{

    protected $fillable = [

        'build',
        'floor',
        'name',
        'type',
        'department'

    ];


    protected $table = 'local';

}
