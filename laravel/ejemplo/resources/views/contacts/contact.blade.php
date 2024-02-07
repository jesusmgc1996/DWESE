<html>
    <head></head>
    <body>
        @include('contacts.header')
        
        <h2>Hola, soy {{$nombre}} y tengo {{$edad}} años</h2>
        
        @if($edad > 18)
            Eres mayor de edad<br>
        @else
            Eres menor de edad<br>
        @endif

        @foreach ($frutas as $f)
            {{$f}}<br>
        @endforeach
    </body>
</html>