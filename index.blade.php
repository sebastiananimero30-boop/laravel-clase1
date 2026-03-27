{{-- resources/views/estudiantes/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Lista de Estudiantes')

@section('content')
    <a href='{{ route('estudiantes.create') }}' class='btn btn-success'>
        + Registrar Nuevo Estudiante
    </a>
    <br><br>

    @if($estudiantes->isEmpty())
        <p>No hay estudiantes registrados aún.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Email</th>
                    <th>Ficha</th><th>Programa</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($estudiantes as $est)
                <tr>
                    <td>{{ $est->id }}</td>
                    <td>{{ $est->nombre }} {{ $est->apellido }}</td>
                    <td>{{ $est->email }}</td>
                    <td>{{ $est->ficha }}</td>
                    <td>{{ $est->programa }}</td>
                    <td>
                        <a href='{{ route('estudiantes.edit', $est) }}'
                           class='btn btn-warning'>Editar</a>
                        <form action='{{ route('estudiantes.destroy', $est) }}'
                              method='POST' style='display:inline'>
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-danger'
                                onclick='return confirm("¿Eliminar?")'>
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
