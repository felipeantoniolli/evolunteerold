<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interesse extends Model
{
    use softDeletes;

    protected $table = 'interesses';
    protected $fillable = ['interesse'];
    protected $guarded = ['idinter', 'idvol', 'deleted_at', 'created_at', 'update_at'];
}
