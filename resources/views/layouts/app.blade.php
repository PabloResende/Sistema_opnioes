<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sistema de Opiniões') }}</title>

    <link rel="stylesheet" href="../css/responses.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            z-index: 1050;
            padding-top: 20px;
        }

        .main-content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>

    @if (!Route::is('login','register'))
        <!-- Sidebar -->
        <nav class="sidebar">
            <h4 class="text-center">Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item my-2">
                    <a href="{{ route('dashboard') }}" class="nav-link text-white"><i class="bi bi-house me-2"></i> Home</a>
                </li>
                <li class="nav-item my-2">
                    <a href="{{ route('questions.create') }}" class="nav-link text-white"><i class="bi bi-question-circle me-2"></i>Criar Questionário</a>
                </li>
                <li class="nav-item my-2">
                    <a href="{{ route('responses.index') }}" class="nav-link text-white"><i class="bi bi-bell me-2">Responder Questionário</i></a>
                </li>
                <li class="nav-item my-2">
                    <a href="{{ route('questions.index') }}" class="nav-link text-white"><i class="bi bi-bar-chart me-2"></i>Questionário e Respostas</a>
                </li>
            </ul>
        </nav>
    @endif

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
