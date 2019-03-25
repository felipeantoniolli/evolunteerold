<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ensino extends Model
{
    use softDeletes;

    protected $table = 'ensinos';
    protected $fillable = ['nome', 'tipo', 'inicio', 'conclusao', 'concluido', 'obs'];
    protected $guarded = ['idens', 'idvol', 'deleted_at', 'created_at', 'update_at'];
}
