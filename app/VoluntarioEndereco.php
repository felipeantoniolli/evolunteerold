<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoluntarioEndereco extends Model
{
    use softDeletes;

    protected $table = 'voluntarios_enderecos';

    protected $fillable = [
        'idVoluntario',
        'idEndereco'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
