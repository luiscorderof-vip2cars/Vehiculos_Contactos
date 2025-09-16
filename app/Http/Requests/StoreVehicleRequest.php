<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class StoreVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // ajustar si usas autenticación/middleware
    }

    public function rules()
    {
        $currentYear = Carbon::now()->year;
        return [
            'placa' => ['required','string','max:20','unique:vehicles,placa'],
            'marca' => ['required','string','max:100'],
            'modelo' => ['nullable','string','max:100'],
            'anio'  => ['nullable','integer','between:1900,'.$currentYear],
            'cliente_nombre' => ['required','string','max:100'],
            'cliente_apellidos' => ['nullable','string','max:150'],
            'cliente_documento' => ['required','string','max:50'],
            'cliente_email' => ['nullable','email','max:150'],
            'cliente_telefono' => ['nullable','string','max:50'],
        ];
    }

    public function messages()
    {
        return [
            'placa.unique' => 'La placa ya existe en el sistema.',
            'cliente_nombre.required' => 'El nombre del cliente es obligatorio.',
            'cliente_documento.required' => 'El número de documento del cliente es obligatorio.',
        ];
    }
}
