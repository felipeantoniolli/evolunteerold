<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstituicaoEndereco extends Model
{
    use softDeletes;

    protected $table = 'instituicoes_enderecos';

    protected $fillable = [
        'idInstituicao',
        'idEndereco'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
