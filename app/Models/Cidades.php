<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cidades extends Model
{
    protected $fillable = [
        'nome',
        'estado'
    ];
}
