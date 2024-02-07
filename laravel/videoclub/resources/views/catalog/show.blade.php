<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            VIDEOCLUB
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-rows-1">
                        @if (session('msg') == 1)
                        <div>
                            <p>La acción se ejecutó correctamente</p>
                        </div>
                        @endif
                        <div class="grid grid-cols-2">
                            <div>
                                <img src="{{ $pelicula->poster }}">
                            </div>
                            <div>
                                <p class="text-5xl">{{ $pelicula->title }}</p>
                                <p class="text-xl">Año: {{ $pelicula->year }} Director: {{ $pelicula->director }}</p>
                                <br>
                                <p><b>Resumen:</b> {{ $pelicula->synopsis }}</p><br>
                                <p><b>Estado:</b>
                                    @if ($pelicula->rented == false)
                                    Película disponible
                                    @else
                                    Película actualmente alquilada
                                    @endif
                                </p><br>
                                @if ($pelicula->rented == false)
                                <form action="{{ route('rent', ['id' => $pelicula->id]) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Alquilar
                                        película</button>
                                </form>
                                @else
                                <form action="{{ route('return', ['id' => $pelicula->id]) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Devolver
                                        película</button>
                                </form>
                                @endif
                                <a href="{{ route('edit', ['id' => $pelicula->id]) }}">
                                    <button type="button"
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Editar
                                        película</button>
                                </a>
                                <form action="{{ route('delete', ['id' => $pelicula->id]) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar
                                        película</button>
                                </form>
                                <a href="{{ route('catalog') }}">
                                    <button type="button"
                                        class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Volver
                                        al listado</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>