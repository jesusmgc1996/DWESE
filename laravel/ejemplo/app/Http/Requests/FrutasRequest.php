<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrutasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nombre" => "required | min:5 | lowercase",
            "desc" => "required | max:10",
            "temp" => "required"
        ];
    }

    public function messages(): array
    {
        return [
            "nombre.min" => "El :attribute debe ser mayor de 5 caracteres",
            "nombre.lowercase" => "El nombre debe estar en minúsculas",
            "desc.max" => "La descripción debe tener un máximo de 10 caracteres",
            "temp.required" => "Debes seleccionar al menos una temporada"
        ];
    }

    public function attributes(): array
    {
        return [
            "nombre" => "nombre de la fruta"
        ];
    }
}
