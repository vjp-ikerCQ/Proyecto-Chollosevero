<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Chollo ░▒▓ Severo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-brand .logo-severo {
            color: #dc3545;
        }
        .card-chollo {
            transition: transform 0.2s;
            height: 100%;
        }
        .card-chollo:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .card-chollo .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .precio-original {
            text-decoration: line-through;
            color: #6c757d;
        }
        .precio-descuento {
            color: #dc3545;
            font-weight: bold;
            font-size: 1.25rem;
        }
        .badge-categoria {
            font-size: 0.85rem;
        }
        .puntuacion {
            color: #ffc107;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1.5rem 0;
            margin-top: 3rem;
        }
        footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        footer a:hover {
            color: #fff;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('chollos.index') }}">
                ░▒▓ <span class="logo-severo">Chollo</span> ░▒▓ Severo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chollos.index') }}">
                            <i class="bi bi-house-door"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chollos.index', ['orden' => 'nuevos']) }}">
                            <i class="bi bi-clock-history"></i> Nuevos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chollos.index', ['orden' => 'destacados']) }}">
                            <i class="bi bi-star"></i> Destacados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success btn-sm ms-2 text-white" href="{{ route('chollos.create') }}">
                            <i class="bi bi-plus-circle"></i> Nuevo Chollo
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-1">© CholloSevero {{ date('Y') }}</p>
            <p class="mb-0"><small>Creado por CholloSevero Team</small></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>