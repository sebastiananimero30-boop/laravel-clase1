{{-- resources/views/estudiantes/create.blade.php --}}
@extends('layouts.app')
@section('title', 'Registrar Estudiante')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-person-plus-fill"></i> Registrar Nuevo Estudiante
                    </h4>
                </div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong><i class="bi bi-exclamation-triangle-fill"></i>
                                Corrige los siguientes errores:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('estudiantes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre *</label>
                            <input type="text" name="nombre" class="form-control
                                   @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre') }}" placeholder="Ej: Juan">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Apellido *</label>
                            <input type="text" name="apellido" class="form-control
                                   @error('apellido') is-invalid @enderror"
                                   value="{{ old('apellido') }}" placeholder="Ej: Pérez">
                            @error('apellido')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email *</label>
                            <input type="email" name="email" class="form-control
                                   @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="juan@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Teléfono</label>
                            <input type="text" name="telefono" class="form-control
                                   @error('telefono') is-invalid @enderror"
                                   value="{{ old('telefono') }}" placeholder="Ej: 3001234567">
                            <div class="form-text">Campo opcional.</div>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Número de Ficha *</label>
                            <input type="text" name="ficha" class="form-control
                                   @error('ficha') is-invalid @enderror"
                                   value="{{ old('ficha') }}" placeholder="Ej: 2883614">
                            @error('ficha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Programa *</label>
                            <input type="text" name="programa" class="form-control
                                   @error('programa') is-invalid @enderror"
                                   value="{{ old('programa') }}"
                                   placeholder="Análisis y Desarrollo de Software">
                            @error('programa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save-fill"></i> Guardar
                            </button>
                            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
