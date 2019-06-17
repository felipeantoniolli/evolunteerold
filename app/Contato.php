<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use softDeletes;

    protected $table = 'enderecos';

    protected $fillable = [
        'idContato',
        'tipo',
        'valor',
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
