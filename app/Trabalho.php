<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabalho extends Model
{
    use softDeletes;

    protected $table = 'trabalhos';

    protected $fillable = [
        'idTrabalho',
        'idInstituicao',
        'nome',
        'conteudo',
        'dataCriacao',
        'dataTrabalho'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
