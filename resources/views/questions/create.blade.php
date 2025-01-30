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
                    <label for="description" class="form-label">Descrição (Opcional)</label>
                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Digite uma descrição"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Criar Pergunta</button>
            </form>
        </div>
    </div>

    {{-- Perguntas Criadas --}}
    <h3 class="mt-5 mb-3">Perguntas Criadas</h3>
    @if ($questions->isEmpty())
        <p class="text-muted">Nenhuma pergunta criada ainda.</p>
    @else
        <div class="list-group">
            @foreach ($questions as $question)
                <div class="list-group-item">
                   <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $question->title }}</strong>
                            @if ($question->description)
                                <p class="text-muted">{{ $question->description }}</p>
                            @endif
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-warning me-3" style="min-width: 80px;">Editar</a>
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta pergunta?')">Excluir</button>
                            </form>
                        </div>
                    </div>
                    {{-- Exibe as respostas --}}
                    @if ($question->responses->isNotEmpty())
                        <div class="mt-3">
                            <h5 class="mb-2">Respostas:</h5>
                            <ul class="list-group">
                                @foreach ($question->responses as $response)
                                    <li class="list-group-item">
                                        <strong>Nota:</strong> {{ $response->rating }} -
                                        <strong>Comentário:</strong> {{ $response->opinion ?? 'Sem comentário' }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    {{-- Formulário para Responder Perguntas --}}
    <h3 class="mt-5">Responda as Perguntas</h3>
    <form method="POST" action="{{ route('responses.store') }}">
        @csrf
        <div class="row">
            @foreach ($questions as $question)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $question->title }}</h5>
                            @if ($question->description)
                                <p class="text-muted">{{ $question->description }}</p>
                            @endif

                            <div class="mb-3">
                                <label for="rating-{{ $question->id }}" class="form-label">Dê uma nota (1-5):</label>
                                <select id="rating-{{ $question->id }}" name="responses[{{ $question->id }}][rating]" class="form-select" required>
                                    <option value="1">1 - Ruim</option>
                                    <option value="2">2 - Regular</option>
                                    <option value="3">3 - Bom</option>
                                    <option value="4">4 - Muito bom</option>
                                    <option value="5">5 - Excelente</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="opinion-{{ $question->id }}" class="form-label">Comentário (opcional):</label>
                                <textarea id="opinion-{{ $question->id }}" name="responses[{{ $question->id }}][opinion]" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success mt-3">Enviar Respostas</button>
    </form>
</div>
@endsection
