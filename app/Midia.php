<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Midia extends Model
{
    use softDeletes;

    protected $table = 'midias';

    protected $fillable = [
        'idMidia',
        'url',
        'dataCriacao'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
