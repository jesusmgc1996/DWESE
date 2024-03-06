<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'dni' => 'required | min:9 | max:9 | unique:users,dni,NULL,id,deleted_at,NULL',
            'name' => 'required | max:255',
            'surname' => 'required | max:255',
            'email' => 'required | lowercase | email | max:255 | unique:users,email,NULL,id,deleted_at,NULL',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required | max:255'
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
            'password.required' => 'Debes introducir la contraseña.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password' => 'La contraseña debe tener al menos 8 caracteres.',
            'role.required' => 'Debe introducir el rol.',
            'role.max' => 'El rol debe tener menos de 255 caracteres.',
        ];
    }
}
