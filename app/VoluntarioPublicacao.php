<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoluntarioPublicacao extends Model
{
    use softDeletes;

    protected $table = 'voluntarios_publicacoes';

    protected $fillable = [
        'idVoluntario',
        'idPublicacao'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
