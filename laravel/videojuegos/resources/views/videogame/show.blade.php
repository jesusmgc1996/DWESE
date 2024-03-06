<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle del videojuego') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset($route . $videogame->photo) }}" alt="" />
                        </a>
                        <div class="p-5">
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nombre: {{ $videogame->name }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Desarrollador: {{ $videogame->developer->name }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Plataformas:
                                {{ $videogame->platforms->pluck('name')->join(', ') }}
                            </p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Año: {{ $videogame->year }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>