<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'NM_admin',
        'email_admin',
        'senha'
    ];
}