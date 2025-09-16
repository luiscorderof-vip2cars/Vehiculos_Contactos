<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required','string','max:100'],
            'apellidos' => ['nullable','string','max:150'],
            'documento' => ['nullable','string','max:50'],
            'email' => ['nullable','email','max:150'],
            'telefono' => ['nullable','string','max:50'],
            'cargo' => ['nullable','string','max:100'],
            'notas' => ['nullable','string'],
        ];
    }
}
