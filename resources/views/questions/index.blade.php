@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Perguntas</h1>
    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Criar Nova Pergunta</a>

    @if ($questions->isEmpty())
        <div class="alert alert-warning" role="alert">
            Não há perguntas cadastradas.
        </div>
    @else
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Pergunta</th>
                    <th>Tipo de Resposta</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->title }}</td>
                        <td>{{ ucfirst($question->type) }}</td>
                        <td>
                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta pergunta?');">Excluir</button>
                            </form>
                            <a href="{{ route('responses.index', $question->id) }}" class="btn btn-success btn-sm">Ver Respostas</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding: 0;">
                            <div class="responses mt-2 p-3 border-top bg-light">
                                <h6 class="font-weight-bold">Respostas:</h6>
                            @php
    $hasResponses = $question->responses->filter(function ($response) {
        return !empty($response->rating) || !empty($response->comment) || !empty($response->radio);
    })->isNotEmpty();
@endphp

@if (!$hasResponses)
    <p class="text-muted">Não há respostas para esta pergunta.</p>
@else

                                    <ul class="list-group list-group-flush">
                                        @foreach ($question->responses as $response)
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center">
                                                    <!-- Exibir Estrelas -->
                                                    @if ($response->rating)
                                                        <span class="mr-2 font-weight-bold">Avaliação:</span>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="fas fa-star {{ $i <= $response->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                                        @endfor
                                                    @endif

                                                    <!-- Exibir Opinião (Radio) -->
                                                    @if (!empty($response->radio))
                                                       <span class="ml-3 badge badge-primary text-dark" style="font-size: 16px; background-color: transparent;">

                                                            {{ $response->radio }}
                                                        </span>
                                                    @endif
                                                </div>

                                                <!-- Exibir Comentário -->
                                                @if ($response->comment)
                                                    <p class="mt-2 mb-0 p-2 bg-white border rounded">
                                                        <strong>Comentário:</strong> {{ $response->comment }}
                                                    </p>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
