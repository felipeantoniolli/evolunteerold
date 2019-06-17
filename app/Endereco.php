<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use softDeletes;

    protected $table = 'enderecos';

    protected $fillable = [
        'idEndereco',
        'idVoluntario',
        'cep',
        'rua',
        'numero',
        'complemento',
        'cidade',
        'estado'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
