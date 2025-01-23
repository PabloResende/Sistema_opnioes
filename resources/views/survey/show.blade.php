@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Responda as Perguntas</h1>

    <form method="POST" action="{{ route('survey.store', ['id' => $id]) }}">
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
