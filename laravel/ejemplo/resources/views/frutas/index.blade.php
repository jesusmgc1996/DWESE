<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>LISTADO DE FRUTAS</h1>
    <ul>
        @foreach ($frutas as $f)
        <li>Nombre: {{ $f->nombrefruta }}</li>
        <li>Temporada: {{ $f->temporada }}</li>
        <li>País: {{ $f->pais }}</li><hr>
        @endforeach
    </ul>

    <a href="{{route('naranjas', ['num' => 10])}}">Ir a naranjas</a><br>
    <a href="{{url('/peras')}}">Ir a peras</a>

    <h1>FORMULARIO PARA AÑADIR FRUTA</h1>

    @if (session('msg'))
    {{session('msg')}}
    @endif

    <form action="" method="post">
        @csrf
        Nombre: <input type="text" name="nombre" value="{{old('nombre')}}"><br>
        @foreach ($errors->get('nombre') as $error)
        {{$error}}<br>
        @endforeach<br>
        Error con @ error<br>
        @error('nombre')
        {{$message}}<br>
        @enderror
        Descripción: <textarea name="desc">{{old('desc')}}</textarea><br>
        {{$errors->first('desc')}}<br>
        Temporada:<br>
        <input type="checkbox" name="temp[]" value="primavera" @if (in_array('primavera', old('temp', array()))) checked
            @endif>Primavera<br>
        <input type="checkbox" name="temp[]" value="verano" @if (in_array('verano', old('temp', array()))) checked
            @endif>Verano<br>
        <input type="checkbox" name="temp[]" value="otoño" @if (in_array('otoño', old('temp', array()))) checked
            @endif>Otoño<br>
        <input type="checkbox" name="temp[]" value="invierno" @if (in_array('invierno', old('temp', array()))) checked
            @endif>Invierno<br>
        @if ($errors->has('temp'))
        {{$errors->first('temp')}}<br>
        @endif
        <input type="submit" name="enviar" value="Enviar">
    </form><br>

    @if ($errors->any())
    <h2>Errores:</h2>
    @foreach ($errors->all() as $error)
    {{$error}}<br>
    @endforeach
    @endif
</body>

</html>