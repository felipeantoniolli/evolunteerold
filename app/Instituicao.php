<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instituicao extends Model
{
    use softDeletes;

    protected $table = 'instituicoes';

    protected $fillable = [
        'idInstituicao',
        'idUsuario',
        'razao',
        'fantasia',
        'cpf',
        'cnpj'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
