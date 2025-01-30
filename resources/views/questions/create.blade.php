@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Criar Perguntas</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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

    <h3>Perguntas Criadas</h3>
    @if ($questions->isEmpty())
        <p class="text-muted">Nenhuma pergunta criada ainda.</p>
    @else
        <ul class="list-group">
            @foreach ($questions as $question)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $question->title }}</strong>
                        @if ($question->description)
                            <p class="text-muted mb-0">{{ $question->description }}</p>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-warning me-2">Editar</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta pergunta?')">Excluir</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    <h3 class="mt-4">Responda as Perguntas</h3>
    <form method="POST" action="{{ route('responses.store') }}">
        @csrf
        @foreach ($questions as $question)
            <div class="mb-4">
                <h4>{{ $question->title }}</h4>
                @if ($question->description)
                    <p class="text-muted">{{ $question->description }}</p>
                @endif

                <div class="mb-2">
                    <label for="rating-{{ $question->id }}">Dê uma nota (1-5):</label>
                    <select id="rating-{{ $question->id }}" name="responses[{{ $question->id }}][rating]" class="form-select" required>
                        <option value="1">1 - Ruim</option>
                        <option value="2">2 - Regular</option>
                        <option value="3">3 - Bom</option>
                        <option value="4">4 - Muito bom</option>
                        <option value="5">5 - Excelente</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="opinion-{{ $question->id }}">Comentário (opcional):</label>
                    <textarea id="opinion-{{ $question->id }}" name="responses[{{ $question->id }}][opinion]" class="form-control"></textarea>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Enviar Respostas</button>
    </form>
</div>
@endsection
