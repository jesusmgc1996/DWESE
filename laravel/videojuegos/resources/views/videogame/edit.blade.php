<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar videojuego') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('videogame.update', ['videogame' => $videogame->id]) }}" method="POST"
                        class="max-w-md mx-auto" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="name" id="name" value="{{ old('name', $videogame->name) }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre:</label>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <select name="developer" id="developer"
                                class="mt-3 block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                @foreach ($developers as $developer)
                                <option value="{{ $developer->id }}" {{ old('developer', $videogame->
                                    developer_id==$developer->id) ?
                                    'selected' : '' }}>{{ $developer->name }}</option>
                                @endforeach
                            </select>
                            <label for="developer"
                                class="pb-5 absolute text-sm text-gray-500 dark:text-gray-400 duration-300 top-0 left-0 z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                                Desarrollador:
                            </label>
                            @error('developer')
                            <div
                                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                                {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="flex flex-col mb-5">
                            <span class="mb-2 text-sm text-gray-900 dark:text-gray-400">Plataformas:</span>
                            @foreach ($platforms as $platform)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="platforms[]" value="{{ $platform->id }}" {{
                                    (is_array(old('platforms')) && in_array($platform->id, old('platforms'))) ||
                                (!$errors->any() && $videogame->platforms->contains($platform->id)) ? 'checked'
                                : '' }}
                                class="text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500
                                dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700
                                dark:border-gray-600">
                                <span class="ml-2 text-sm text-gray-900 dark:text-gray-400">{{ $platform->name }}</span>
                            </label>
                            @endforeach
                            @error('platforms')
                            <div
                                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                                {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="number" name="year" id="year" value="{{ old('year', $videogame->year) }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="year"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Año:</label>
                            @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="file" name="photo" id="photo" value="{{ old('photo') }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <img src="{{ asset($route . $videogame->photo) }}" width="100">
                            <label for="photo"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Imagen:</label>
                            @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modificar
                            videojuego</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>