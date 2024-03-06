<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $request->validated();

        try {
            $user = new User();
            $user->dni = $request->dni;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;

            $user->save();

            return to_route('user.index')->with('status', 'Usuario añadido correctamente');
        } catch (QueryException $e) {
            return to_route('user.index')->with('status', 'Error en la base de datos');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'dni' => 'required | min:9 | max:9 | unique:users,dni,' . $user->id . ',id,deleted_at,NULL',
            'name' => 'required | max:255',
            'surname' => 'required | max:255',
            'email' => 'required | lowercase | email | max:255 | unique:users,email,' . $user->id . ',id,deleted_at,NULL',
            'role' => 'required | max:255'
        ], [
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
            'role.required' => 'Debe introducir el rol.',
            'role.max' => 'El rol debe tener menos de 255 caracteres.',
        ]);

        try {
            $user->dni = $request->dni;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->role = $request->role;

            $user->save();

            return to_route('user.index')->with('status', 'Usuario actualizado correctamente');
        } catch (QueryException $e) {
            return to_route('user.index')->with('status', 'Error en la base de datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return to_route('user.index')->with('status', 'Usuario borrado correctamente');
        } catch (QueryException $e) {
            return to_route('user.index')->with('status', 'Error en la base de datos');
        }
    }

    public function pdf()
    {
        $pdf = PDF::loadView('user.index');

        return $pdf->download('users.pdf');
    }
}
