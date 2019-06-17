<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaAtuacao extends Model
{
    use softDeletes;

    protected $table = 'areas_atuacoes';

    protected $fillable = [
        'idAreaAtuacao',
        'nome'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
