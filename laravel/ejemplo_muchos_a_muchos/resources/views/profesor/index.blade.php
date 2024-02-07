@foreach ($alumnos as $alumno)
    DNI: {{ $alumno->dni }}<br>
    Nombre: {{ $alumno->nombre }}<br>
    Apellidos: {{ $alumno->apellidos }}<br>
    E-mail: {{ $alumno->email }}<br>
    Curso: {{ $alumno->curso }}<br>
    Asignatura: {{ $alumno->pivot->asignatura }}<br>
    Nota: {{ $alumno->pivot->nota }}<hr>
@endforeach

{{ $alumnos->links() }}