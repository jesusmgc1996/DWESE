<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-guest-layout>
        <form method="POST" action="{{ route('prof.store') }}">
            @csrf

            <!-- DNI -->
            <div>
                <x-input-label for="dni" :value="__('DNI')" />
                <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required
                    autofocus autocomplete="dni" />
                <x-input-error :messages="$errors->get('dni')" class="mt-2" />
            </div>

            <!-- Nombre -->
            <div class="mt-4">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                    autocomplete="nombre" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Apellidos -->
            <div class="mt-4">
                <x-input-label for="apellidos" :value="__('Apellidos')" />
                <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos"
                    :value="old('apellidos')" required autocomplete="apellidos" />
                <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Curso -->
            <div class="mt-4">
                <x-input-label for="curso" :value="__('Curso')" />
                <x-text-input id="curso" class="block mt-1 w-full" type="text" name="curso" :value="old('curso')"
                    required autocomplete="curso" />
                <x-input-error :messages="$errors->get('curso')" class="mt-2" />
            </div>

            <!-- Asignatura -->
            <div class="mt-4">
                <x-input-label for="asignatura" :value="__('Asignatura')" />
                <x-text-input id="asignatura" class="block mt-1 w-full" type="text" name="asignatura" :value="old('asignatura')"
                    required autocomplete="asignatura" />
                <x-input-error :messages="$errors->get('curso')" class="mt-2" />
            </div>

            <!-- Nota -->
            <div class="mt-4">
                <x-input-label for="nota" :value="__('Nota')" />
                <x-text-input id="nota" class="block mt-1 w-full" type="text" name="nota" :value="old('nota')"
                    required autocomplete="nota" />
                <x-input-error :messages="$errors->get('curso')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Añadir') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</body>

</html>