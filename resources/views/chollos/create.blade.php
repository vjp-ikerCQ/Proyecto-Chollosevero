@extends('layouts.app')

@section('title', 'Crear Chollo - ░▒▓ Severo')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Crear Nuevo Chollo</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong><i class="bi bi-exclamation-triangle"></i> Por favor, corrige los siguientes errores:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('chollos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título *</label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                               id="titulo" name="titulo" 
                               value="{{ old('titulo') }}" required>
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción *</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">URL Externa *</label>
                        <input type="url" class="form-control @error('url') is-invalid @enderror" 
                               id="url" name="url" 
                               value="{{ old('url') }}" required>
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="categoria" class="form-label">Categoría *</label>
                            <input type="text" class="form-control @error('categoria') is-invalid @enderror" 
                                   id="categoria" name="categoria" 
                                   value="{{ old('categoria') }}" required>
                            @error('categoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="puntuacion" class="form-label">Puntuación (0-10) *</label>
                            <input type="number" class="form-control @error('puntuacion') is-invalid @enderror" 
                                   id="puntuacion" name="puntuacion" 
                                   value="{{ old('puntuacion', 5) }}" min="0" max="10" required>
                            @error('puntuacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="precio" class="form-label">Precio (€) *</label>
                            <input type="number" class="form-control @error('precio') is-invalid @enderror" 
                                   id="precio" name="precio" 
                                   value="{{ old('precio') }}" min="0" step="0.01" required>
                            @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="precio_descuento" class="form-label">Precio con Descuento (€) *</label>
                            <input type="number" class="form-control @error('precio_descuento') is-invalid @enderror" 
                                   id="precio_descuento" name="precio_descuento" 
                                   value="{{ old('precio_descuento') }}" min="0" step="0.01" required>
                            @error('precio_descuento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="disponible" class="form-label">Disponible *</label>
                        <select class="form-select @error('disponible') is-invalid @enderror" 
                                id="disponible" name="disponible" required>
                            <option value="1" {{ old('disponible') == '1' ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ old('disponible') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('disponible')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Crear Chollo
                        </button>
                        <a href="{{ route('chollos.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection