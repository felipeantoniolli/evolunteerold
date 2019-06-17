<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstituicaoAvaliacao extends Model
{
    use softDeletes;

    protected $table = 'instituicoes_avaliacoes';

    protected $fillable = [
        'idVoluntario',
        'idAvaliacao'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
