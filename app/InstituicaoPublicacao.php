<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstituicaoPublicacao extends Model
{
    use softDeletes;

    protected $table = 'instituicoes_publicacoes';

    protected $fillable = [
        'idInstituicao',
        'idPublicacao'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
