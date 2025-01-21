@extends('layouts.app')

@section('content')
    <h1>Perguntas Criadas</h1>
    <a href="{{ route('questions.create') }}">Criar Nova Pergunta</a>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->title }}</td>
                    <td>{{ $question->description }}</td>
                    <td>
                        <a href="{{ route('questions.edit', $question->id) }}">Editar</a>
                        <form method="POST" action="{{ route('questions.destroy', $question->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
