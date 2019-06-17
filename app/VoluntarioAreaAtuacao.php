<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoluntarioAreaAtuacao extends Model
{
    use softDeletes;

    protected $table = 'voluntarios_areas_atuacoes';

    protected $fillable = [
        'idVoluntario',
        'idAreaAtuacao'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
