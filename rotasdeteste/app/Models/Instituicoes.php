<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicoes extends Model
{
    protected $fillable = [
        'NM_instituicao',
        'email_instituicao',
        'senha',
        'descricao',
        'endereco_intituicao',
        'telefone'
    ];
} 