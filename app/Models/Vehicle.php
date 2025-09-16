<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 Importa el trait
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory; // 👈 Actívalo

    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'anio',
        'cliente_nombre',
        'cliente_apellidos',
        'cliente_documento',
        'cliente_email',
        'cliente_telefono',
    ];
}
