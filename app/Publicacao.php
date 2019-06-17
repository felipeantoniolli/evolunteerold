<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicacao extends Model
{
    use softDeletes;

    protected $table = 'publicacoes';

    protected $fillable = [
        'idPublicacao',
        'titulo',
        'conteudo',
        'dataCriacao',
        'dataEdicao',
        'oculto'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
