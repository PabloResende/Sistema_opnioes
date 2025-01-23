@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Criar Perguntas</h2>

    <!-- Exibir mensagens de sucesso -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulário para criar perguntas -->
    <form action="{{ route('questions.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título da Pergunta</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Digite a pergunta" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição (Opcional)</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Digite uma descrição"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Criar Pergunta</button>
    </form>

    <!-- Lista de perguntas -->
    <h3>Perguntas Criadas</h3>
    @if ($questions->isEmpty())
        <p class="text-muted">Nenhuma pergunta criada ainda.</p>
    @else
        <ul class="list-group">
            @foreach ($questions as $question)
                <li class="list-group-item">
                    <strong>{{ $question->title }}</strong>
                    @if ($question->description)
                        <p class="text-muted mb-0">{{ $question->description }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
