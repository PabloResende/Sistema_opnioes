@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Gestão de Perguntas e Respostas</h2>

    {{-- Sucesso --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulário para Criar Pergunta --}}
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Criar Nova Pergunta</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título da Pergunta</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Digite a pergunta" required>
                </div>
                <div class="mb-3">
                <label for="response_types" class="form-label">Como essa pergunta pode ser respondida?</label>
                    <select name="response_types[]" id="response_types" class="form-select" multiple required>
                        <option value="stars">Estrelas (1 a 5)</option>
                        <option value="radio">Muito Ruim, Ruim, Neutro, Bom, Muito Bom</option>
                        <option value="comment">Comentário</option>
                    </select>
                    <small class="text-muted">Segure CTRL (ou CMD no Mac) para selecionar múltiplas opções.</small>
                </div>
                <button type="submit" class="btn btn-primary">Criar Pergunta</button>
            </form>
        </div>
    </div>




</div>
@endsection
