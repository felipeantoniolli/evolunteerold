<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoluntarioAvaliacao extends Model
{
    use softDeletes;

    protected $table = 'voluntarios_avaliacoes';

    protected $fillable = [
        'idVoluntario',
        'idAvaliacao'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
