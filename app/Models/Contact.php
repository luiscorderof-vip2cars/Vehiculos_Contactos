<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 Importa el trait
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory; // 👈 Actívalo

    protected $fillable = [
        'nombre',
        'apellidos',
        'documento',
        'email',
        'telefono',
        'cargo',
        'notas'
    ];
}
