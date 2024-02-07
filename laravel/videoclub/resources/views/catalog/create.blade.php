<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            AÑADIR PELÍCULA
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('postCreate') }}" method="POST" >
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Título')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus autocomplete="title" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="year" :value="__('Año')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year"
                                :value="old('year')" required autocomplete="year" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="director" :value="__('Director')" />
                            <x-text-input id="director" class="block mt-1 w-full" type="text" name="director"
                                :value="old('director')" required autocomplete="director" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="poster" :value="__('Póster')" />
                            <x-text-input id="poster" class="block mt-1 w-full" type="text" name="poster"
                                :value="old('poster')" required autocomplete="poster" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="synopsis" :value="__('Resumen')" />
                            <textarea id="synopsis"
                                class="block mt-1 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="synopsis" :value="old('synopsis')" required autocomplete="synopsis" /></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Añadir película') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>