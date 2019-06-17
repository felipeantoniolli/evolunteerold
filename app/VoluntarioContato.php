<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoluntarioContato extends Model
{
    use softDeletes;

    protected $table = 'voluntarios_contatos';

    protected $fillable = [
        'idVoluntario',
        'idContato'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
