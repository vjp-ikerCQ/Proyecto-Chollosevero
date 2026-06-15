@extends('layouts.app')

@section('title', $chollo->titulo . ' - ░▒▓ Severo')

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ asset('img/' . $chollo->id . '-chollo-severo.jpg') }}" 
             class="img-fluid rounded shadow" 
             alt="{{ $chollo->titulo }}"
             onerror="this.src='{{ asset('img/default-chollo.jpg') }}'">
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
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
                <h2 class="card-title mb-3">{{ $chollo->titulo }}</h2>
                <p class="card-text">{{ $chollo->descripcion }}</p>
                
                <div class="my-4">
                    <div class="d-flex align-items-center gap-3">
                        <span class="precio-original fs-5">€{{ number_format($chollo->precio, 2) }}</span>
                        <span class="precio-descuento fs-3">€{{ number_format($chollo->precio_descuento, 2) }}</span>
                        @php
                            $descuento = round((($chollo->precio - $chollo->precio_descuento) / $chollo->precio) * 100);
                        @endphp
                        @if($descuento > 0)
                            <span class="badge bg-danger fs-6">-{{ $descuento }}%</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    @if($chollo->disponible)
                        <span class="badge bg-success fs-6"><i class="bi bi-check-circle"></i> Disponible</span>
                    @else
                        <span class="badge bg-secondary fs-6"><i class="bi bi-x-circle"></i> No disponible</span>
                    @endif
                </div>

                <div class="mb-3">
                    <a href="{{ $chollo->url }}" target="_blank" class="btn btn-primary">
                        <i class="bi bi-box-arrow-up-right"></i> Ver enlace externo
                    </a>
                </div>

                <hr>

                <div class="d-flex gap-2">
                    <a href="{{ route('chollos.edit', $chollo) }}" class="btn btn-outline-primary">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <form action="{{ route('chollos.destroy', $chollo) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Estás seguro de que quieres eliminar este chollo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-trash"></i> Borrar
                        </button>
                    </form>
                    <a href="{{ route('chollos.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection