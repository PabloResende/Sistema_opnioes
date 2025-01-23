@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-dark">Seja bem-vindo(a)</h1>
        <p class="text-secondary mb-4">Comece o trabalho realizando os seguintes atos simples:</p>

        <div class="row g-4">
            <!-- Botão: Criar Interrogatório -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Crie o Questionário</h5>
                        <p class="card-text text-muted">Crie um novo questionário para coletar opiniões.</p>
                        <a href="{{ route('questions.create') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <!-- Botão: Adicionar Dispositivo -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Adicione o Dispositivo</h5>
                        <p class="card-text text-muted">Conecte dispositivos ao sistema para coletar dados.</p>
                        <a href="{{ route('add.device') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <!-- Botão: Baixar App -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Baixar App</h5>
                        <p class="card-text text-muted">Baixe o aplicativo para gerenciar suas informações.</p>
                        <a href="{{ route('download.app') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
