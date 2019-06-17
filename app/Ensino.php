<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ensino extends Model
{
    use softDeletes;

    protected $table = 'ensinos';

    protected $fillable = [
        'idEnsino',
        'idVoluntario',
        'nome',
        'tipo',
        'dataInicio',
        'dataFim',
        'concluido',
        'obs'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
