{{-- resources/views/estudiantes/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Lista de Estudiantes')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0"><i class="bi bi-people-fill text-success"></i> Estudiantes</h2>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus-fill"></i> Registrar Nuevo Estudiante
        </a>
    </div>

    {{-- Mejora 3: Buscador por nombre / apellido --}}
    <form method="GET" action="{{ route('estudiantes.index') }}" class="mb-4">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" name="busqueda" class="form-control"
                   placeholder="Buscar por nombre o apellido..."
                   value="{{ $busqueda ?? '' }}">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
            @if($busqueda)
                <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary">
                    Limpiar
                </a>
            @endif
        </div>
    </form>

    @if($estudiantes->isEmpty())
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i>
            @if($busqueda)
                No se encontraron estudiantes con el término "<strong>{{ $busqueda }}</strong>".
            @else
                No hay estudiantes registrados aún.
            @endif
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle shadow-sm">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Ficha</th>
                        <th>Programa</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($estudiantes as $est)
                    <tr>
                        <td>{{ $est->id }}</td>
                        <td>{{ $est->nombre }} {{ $est->apellido }}</td>
                        <td>{{ $est->email }}</td>
                        <td>{{ $est->telefono ?? '—' }}</td>
                        <td>{{ $est->ficha }}</td>
                        <td>{{ $est->programa }}</td>
                        <td class="text-center">
                            {{-- Ver detalle (Mejora 2) --}}
                            <a href="{{ route('estudiantes.show', $est) }}"
                               class="btn btn-sm btn-info text-white" title="Ver detalle">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            {{-- Editar --}}
                            <a href="{{ route('estudiantes.edit', $est) }}"
                               class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            {{-- Eliminar --}}
                            <form action="{{ route('estudiantes.destroy', $est) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Eliminar"
                                    onclick="return confirm('¿Seguro que deseas eliminar a {{ $est->nombre }}?')">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <p class="text-muted small">Total: {{ $estudiantes->count() }} estudiante(s)</p>
    @endif

@endsection
