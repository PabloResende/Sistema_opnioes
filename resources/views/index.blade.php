@extends('layouts.app')

@section('title', 'Perguntas e Respostas')

@section('content')
    <h1>Perguntas</h1>
    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        <input type="text" name="title" class="form-control mb-2" placeholder="Faça uma pergunta" required>
        <button type="submit" class="btn btn-primary">Adicionar Pergunta</button>
    </form>
    <hr>
    @foreach ($questions as $question)
        <div>
            <h3>{{ $question->title }}</h3>
            <p>Por {{ $question->user->name }}</p>
            <ul>
                @foreach ($question->answers as $answer)
                    <li>{{ $answer->user->name }}: {{ $answer->content }}</li>
                @endforeach
            </ul>
            <form method="POST" action="{{ route('answers.store', $question->id) }}">
                @csrf
                <textarea name="content" class="form-control mb-2" placeholder="Sua resposta" required></textarea>
                <button type="submit" class="btn btn-success">Responder</button>
            </form>
        </div>
        <hr>
    @endforeach
@endsection
