{{-- resources/views/estudiantes/show.blade.php --}}
@extends('layouts.app')
@section('title', 'Detalle del Estudiante')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow">
                {{-- Encabezado de la tarjeta --}}
                <div class="card-header bg-success text-white d-flex align-items-center gap-2">
                    <i class="bi bi-person-badge-fill fs-4"></i>
                    <div>
                        <h4 class="mb-0">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</h4>
                        <small>Ficha SENA: {{ $estudiante->ficha }}</small>
                    </div>
                </div>

                {{-- Datos del estudiante --}}
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4"><i class="bi bi-hash"></i> ID</dt>
                        <dd class="col-sm-8">{{ $estudiante->id }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-person-fill"></i> Nombre</dt>
                        <dd class="col-sm-8">{{ $estudiante->nombre }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-person-fill"></i> Apellido</dt>
                        <dd class="col-sm-8">{{ $estudiante->apellido }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-envelope-fill"></i> Email</dt>
                        <dd class="col-sm-8">
                            <a href="mailto:{{ $estudiante->email }}">{{ $estudiante->email }}</a>
                        </dd>

                        <dt class="col-sm-4"><i class="bi bi-telephone-fill"></i> Teléfono</dt>
                        <dd class="col-sm-8">{{ $estudiante->telefono ?? 'No registrado' }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-card-list"></i> Ficha</dt>
                        <dd class="col-sm-8">{{ $estudiante->ficha }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-book-fill"></i> Programa</dt>
                        <dd class="col-sm-8">{{ $estudiante->programa }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-calendar-plus"></i> Registrado</dt>
                        <dd class="col-sm-8">{{ $estudiante->created_at->format('d/m/Y H:i') }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-calendar-check"></i> Actualizado</dt>
                        <dd class="col-sm-8">{{ $estudiante->updated_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>

                {{-- Botones de acción --}}
                <div class="card-footer d-flex gap-2">
                    <a href="{{ route('estudiantes.edit', $estudiante) }}"
                       class="btn btn-warning">
                        <i class="bi bi-pencil-fill"></i> Editar
                    </a>
                    <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                            onclick="return confirm('¿Eliminar a {{ $estudiante->nombre }}?')">
                            <i class="bi bi-trash-fill"></i> Eliminar
                        </button>
                    </form>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary ms-auto">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection
