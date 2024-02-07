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
                    @if (session('msg')==1)
                    <div>
                        <p>La película se ha eliminado correctamente</p>
                    </div>
                    @endif
                    <div class="grid grid-cols-4">
                        @foreach ($peliculas as $pelicula)
                        <a href="{{ url('catalog/show/' . $pelicula->id) }}">
                            <img src="{{ $pelicula->poster }}" style="height: 200px">
                            <h4 style="min-height: 45px; margin: 5px 0 10px 0">
                                {{ $pelicula->title }}
                            </h4>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>