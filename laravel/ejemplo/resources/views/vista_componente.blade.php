<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    @php
        $color = "blue";
    @endphp
    <body>
        <div>
            <x-alert :colortext="$color" colorfondo="yellow" class="text-purple-900">
                CUIDADO!!!!
                <x-slot name="texto">
                    TEXTO DE LA ALERTA
                </x-slot>
            </x-alert>

            <x-alert2 colorbg="green">
                Título de la alerta
                <x-slot name="entrada1">
                    ENTRADA 1
                </x-slot>
                <x-slot name="entrada2">
                    ENTRADA 2
                </x-slot>
                <x-slot name="entrada3">
                    ENTRADA 3
                </x-slot>
            </x-alert2>
        </div>
    </body>
</html>