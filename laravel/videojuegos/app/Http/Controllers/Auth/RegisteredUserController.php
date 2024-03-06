<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'dni' => ['required', 'string', 'min:9', 'max:9', 'unique:users,dni,NULL,id,deleted_at,NULL'],
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
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
                'password.required' => 'Debe introducir la contraseña.',
                'password.confirmed' => 'Las contraseñas no coinciden.',
                'password' => 'La contraseña debe tener al menos 8 caracteres.'
            ]
        );

        $user = User::create([
            'dni' => $request->dni,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Usuario'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
