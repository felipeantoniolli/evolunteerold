<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voluntario extends Model
{
    use softDeletes;

    protected $table = 'voluntarios';

    protected $fillable = [
        'idVoluntario',
        'idUsuario',
        'nome',
        'sobrenome',
        'cpf',
        'rg',
        'data_nasc',
        'genero'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
