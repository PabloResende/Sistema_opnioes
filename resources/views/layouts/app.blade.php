<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv+8BfO9o8b6R+q5WgLS6gxw6JNjItL6e09eO+6p0IMt2gFf/jmJcF6wCVK" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Sidebar -->
    <div class="d-flex" id="wrapper">
        <div class="bg-dark text-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4">
                <h4>Logo</h4>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white">Dashboard</a>
                <a href="{{ route('questions.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Perguntas</a>
                <a href="{{ route('statistics') }}" class="list-group-item list-group-item-action bg-dark text-white">Estatísticas</a>
                <a href="{{ route('responses') }}" class="list-group-item list-group-item-action bg-dark text-white">Respostas</a>
                <a href="{{ route('notifications') }}" class="list-group-item list-group-item-action bg-dark text-white">Notificações</a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-dark text-white">Sair</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0duU1-4kqK39zCj8EJ8n2xxfE64zj4mwFhe0k4kCfcFgPR0f" crossorigin="anonymous"></script>

</body>
</html>
