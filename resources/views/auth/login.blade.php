@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Logi</h3>

            <!-- Exibição de Status da Sessão -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Exibição de Erros -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulário de Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Usuário -->
                <div class="mb-3">
                    <label for="name" class="form-label">Usuário</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <!-- Senha -->
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <!-- Lembre-me -->
                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Lembre-me</label>
                </div>

                <!-- Botão de Login -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>

                <div class="d-flex justify-content-between">
                    <!-- Esqueceu a Senha -->
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none" href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                    @endif

                    <!-- Registre-se -->
                    @if (Route::has('register'))
                        <a class="text-decoration-none" href="{{ route('register') }}">Registre-se</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
