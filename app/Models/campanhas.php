<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campanhas extends Model
{
    protected $table = 'campanhas';
    protected $fillable = ['nome', 'ativo'];
}
