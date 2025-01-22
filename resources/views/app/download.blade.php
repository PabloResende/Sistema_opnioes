@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Baixar Aplicativo</h1>
        <p>Faça o download do nosso aplicativo através do link abaixo:</p>
        <a href="{{ asset('path/to/your/app.apk') }}" class="btn btn-primary">Baixar App</a>
    </div>
@endsection
