<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideogameRequest extends FormRequest
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
            'name' => 'required | unique:videogames,name,NULL,id,deleted_at,NULL',
            'year' => 'required | integer',
            'photo' => 'required | image',
            'developer' => 'required',
            'platforms' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debe introducir el nombre.',
            'name.unique' => 'El nombre ya existe.',
            'year.required' => 'Debe introducir el año.',
            'year.integer' => 'El año debe ser un número.',
            'photo' => 'Debe añadir una imagen.',
            'developer' => 'Debe seleccionar un desarrollador',
            'platforms' => 'Debe seleccionar al menos una plataforma.',
        ];
    }
}
