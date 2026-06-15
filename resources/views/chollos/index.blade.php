@extends('layouts.app')

@section('title', 'Chollos - ░▒▓ Severo')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-lightning-charge-fill text-warning"></i> Chollos Disponibles</h1>
    <a href="{{ route('chollos.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Nuevo Chollo
    </a>
</div>

@if($chollos->isEmpty())
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> No hay chollos disponibles. ¡Crea el primero!
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        @foreach($chollos as $chollo)
            <div class="col">
                <div class="card card-chollo">
                    <a href="{{ route('chollos.show', $chollo) }}">
                        <img src="{{ asset('img/' . $chollo->id . '-chollo-severo.jpg') }}" 
                             class="card-img-top" 
                             alt="{{ $chollo->titulo }}"
                             onerror="this.src='{{ asset('img/default-chollo.jpg') }}'">
                    </a>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary badge-categoria">{{ $chollo->categoria }}</span>
                            <span class="puntuacion">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $chollo->puntuacion)
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </span>
                        </div>
                        <h5 class="card-title">
                            <a href="{{ route('chollos.show', $chollo) }}" class="text-decoration-none text-dark">
                                {{ $chollo->titulo }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">{{ Str::limit($chollo->descripcion, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="precio-original">€{{ number_format($chollo->precio, 2) }}</span>
                                <span class="precio-descuento ms-2">€{{ number_format($chollo->precio_descuento, 2) }}</span>
                            </div>
                            <div>
                                @if($chollo->disponible)
                                    <span class="badge bg-success">Disponible</span>
                                @else
                                    <span class="badge bg-secondary">No disponible</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('chollos.edit', $chollo) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        <form action="{{ route('chollos.destroy', $chollo) }}" method="POST" class="d-inline" 
                              onsubmit="return confirm('¿Estás seguro de que quieres eliminar este chollo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i> Borrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection