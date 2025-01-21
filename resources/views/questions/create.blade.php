@extends('layouts.app')

@section('content')
    <h1>Criar Nova Pergunta</h1>

    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        <div>
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection
