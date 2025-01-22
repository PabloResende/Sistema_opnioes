@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1 class="display-4 text-dark">Que seja bem-vindo(a)</h1>
                <p class="lead text-muted">Comece o trabalho realizando os seguintes atos simples</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('questions.create') }}" class="btn btn-primary btn-block btn-lg">
                    <i class="bi bi-file-earmark-plus me-2"></i> Crie o Interrogatório
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('add.device') }}" class="btn btn-primary btn-block btn-lg">
                    <i class="bi bi-device-hdd me-2"></i> Adicione o Dispositivo
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('download.app') }}" class="btn btn-primary btn-block btn-lg">
                    <i class="bi bi-download me-2"></i> Baixar App
                </a>
            </div>
        </div>

        <!-- Optional Section for More Info -->
        <div class="row justify-content-center mt-5">
            <div class="col-12 text-center">
                <p class="text-muted">Você também pode acessar mais opções pela barra lateral esquerda.</p>
            </div>
        </div>
    </div>
@endsection
