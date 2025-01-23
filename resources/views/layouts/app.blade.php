<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sistema de Opiniões') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex">
    <!-- Sidebar -->
    <nav class="d-flex flex-column bg-dark text-white p-3 vh-100" style="width: 250px;">
        <h4 class="text-center">Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item my-2">
                <a href="{{ route('dashboard') }}" class="nav-link text-white"><i class="bi bi-house me-2"></i> Home</a>
            </li>
            <li class="nav-item my-2">
                <a href="{{ route('questions.index') }}" class="nav-link text-white"><i class="bi bi-question-circle me-2"></i> Perguntas</a>
            </li>
            <li class="nav-item my-2">
                <a href="{{ route('statistics') }}" class="nav-link text-white"><i class="bi bi-bar-chart me-2"></i> Estatísticas</a>
            </li>
            <li class="nav-item my-2">
                <a href="{{ route('responses') }}" class="nav-link text-white"><i class="bi bi-chat-left-text me-2"></i> Respostas</a>
            </li>
            <li class="nav-item my-2">
                <a href="{{ route('notifications') }}" class="nav-link text-white"><i class="bi bi-bell me-2"></i> Notificações</a>
            </li>
            <li class="nav-item my-2">
                <a href="{{ route('add.device') }}" class="nav-link text-white"><i class="bi bi-device-hdd me-2"></i> Dispositivos</a>
            </li>
            <li class="nav-item my-2">
                <a href="{{ route('download.app') }}" class="nav-link text-white"><i class="bi bi-download me-2"></i> Baixar App</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4 bg-light">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
