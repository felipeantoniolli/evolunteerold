<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avaliacao extends Model
{
    use softDeletes;

    protected $table = 'avaliacoes';

    protected $fillable = [
        'idAvaliacao',
        'nota',
        'obs'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
