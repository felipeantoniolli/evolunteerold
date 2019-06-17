<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoluntarioMidia extends Model
{
    use softDeletes;

    protected $table = 'voluntarios_midias';

    protected $fillable = [
        'idVoluntario',
        'idMidia'
    ];

    protected $guarded = ['deleted_at', 'created_at', 'update_at'];
}
