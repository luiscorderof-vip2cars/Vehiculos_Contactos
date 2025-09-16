<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $currentYear = Carbon::now()->year;
        $vehicleId = $this->route('vehicle') ? $this->route('vehicle')->id : null;

        return [
            'placa' => ['required','string','max:20', Rule::unique('vehicles','placa')->ignore($vehicleId)],
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
}
