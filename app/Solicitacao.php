<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitacao extends Model
{
    use softDeletes;

    protected $table = 'solicitacoes';

    protected $fillable = [
        'idSolicitacao',
        'idVoluntario',
        'idTrabalho',
        'mensagem',
        'aprovado',
        'justificativa'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
