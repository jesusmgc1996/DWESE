<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'dni' => ['required', 'string', 'min:9', 'max:9', 'unique:users,dni,' . $this->user()->id . ',id,deleted_at,NULL'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $this->user()->id . ',id,deleted_at,NULL'],
        ];
    }

    public function messages()
    {
        return [
            'dni.required' => 'Debe introducir el DNI.',
            'dni.min' => 'El DNI debe tener 9 caracteres.',
            'dni.max' => 'El DNI debe tener 9 caracteres.',
            'dni.unique' => 'El DNI ya existe.',
            'name.required' => 'Debe introducir el nombre.',
            'name.max' => 'El nombre debe tener menos de 255 caracteres.',
            'surname.required' => 'Debe introducir los apellidos.',
            'surname.max' => 'Los apellidos deben tener menos de 255 caracteres.',
            'email.required' => 'Debe introducir el correo electrónico.',
            'email.lowercase' => 'El correo electrónico debe escribirse en minúscula.',
            'email.email' => 'El formato del correo electrónico no es correcto.',
            'email.max' => 'El correo electrónico debe tener menos de 255 caracteres.',
            'email.unique' => 'El correo electrónico ya existe.',
        ];
    }
}
