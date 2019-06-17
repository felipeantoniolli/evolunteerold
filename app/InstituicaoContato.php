<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstituicaoContato extends Model
{
    use softDeletes;

    protected $table = 'instituicoes_contatos';

    protected $fillable = [
        'idInstituicao',
        'idContato'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
