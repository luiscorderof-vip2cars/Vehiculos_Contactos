<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'placa' => $this->placa,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'anio' => $this->anio,
            'cliente' => [
                'nombre' => $this->cliente_nombre,
                'apellidos' => $this->cliente_apellidos,
                'documento' => $this->cliente_documento,
                'email' => $this->cliente_email,
                'telefono' => $this->cliente_telefono,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
