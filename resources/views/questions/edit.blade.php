@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Pergunta</h2>

    <!-- Mensagens de erro -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário de edição -->
    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Título da Pergunta</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $question->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição (Opcional)</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $question->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
