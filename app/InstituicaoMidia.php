<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstituicaoMidia extends Model
{
    use softDeletes;

    protected $table = 'instituicoes_midias';

    protected $fillable = [
        'idInstituicao',
        'idMidia'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
