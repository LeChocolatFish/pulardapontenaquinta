<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'NM_usuario',
        'email',
        'senha',
        'cpf'
    ];
}
